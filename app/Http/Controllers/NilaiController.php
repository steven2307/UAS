<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function show($id)
    {
        $mapel = Mapel::find($id);
        $dosen = $mapel->dosen;
        $user = Auth::user();

        $nilai = Nilai::where('id_mhs', $user->id_mhs)
                    ->where('id_mapel', $mapel->id)
                    ->first();

        return view("nilai", compact("mapel", "dosen", "user", "nilai"));
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_dosen' => 'required',
            'id_mapel' => 'required',
            'suasana_kelas' => 'required',
            'waktu_kehadiran' => 'required',
            'kualitas_pengajaran' => 'required',
            'tugas_penilaian' => 'required',
            'profesionalisme' => 'required',
        ]);

        $user = Auth::user();

        $existingNilai = Nilai::where('id_mhs', $user->id_mhs)
                              ->where('id_mapel', $request->id_mapel)
                              ->first();

        if ($existingNilai) {
            return redirect()->back()->with('error', 'Anda sudah memberikan penilaian!');
        }

        Nilai::create([
            'id_mhs' => $user->id_mhs,
            'id_dosen' => $request->id_dosen,
            'id_mapel' => $request->id_mapel,
            'suasana_kelas' => $request->suasana_kelas,
            'waktu_kehadiran' => $request->waktu_kehadiran,
            'kualitas_pengajaran' => $request->kualitas_pengajaran,
            'tugas_penilaian' => $request->tugas_penilaian,
            'profesionalisme' => $request->profesionalisme,
        ]);

        return redirect()->back()->with('success', 'Penilaian berhasil disimpan!');
    }
}
