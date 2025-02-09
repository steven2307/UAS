<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Mapel;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function tambah()
    {
        $dosens = User::whereNotNull('id_dosen')->get();

        return view('mapel', compact('dosens'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'id_dosen' => 'required|exists:users,id_dosen',
            'mapel' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'semester' => 'required|integer|max:10',
        ]);

        Mapel::create([
            'id_dosen' => $request->id_dosen,
            'mapel' => $request->mapel,
            'jurusan' => $request->jurusan,
            'semester' => $request->semester,
        ]);

        return redirect()->back()->with('success', 'Mata kuliah berhasil disimpan!');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        $dosens = User::whereNotNull('id_dosen')->get(); // Ambil daftar dosen

        return view('mapel', compact('mapel', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_dosen' => 'required|exists:users,id_dosen',
            'jurusan' => 'required|string',
            'mapel' => 'required|string',
            'semester' => 'required|integer',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->update([
            'id_dosen' => $request->id_dosen,
            'jurusan' => $request->jurusan,
            'mapel' => $request->mapel,
            'semester' => $request->semester,
        ]);

        return redirect()->back()->with('success', 'Mata kuliah berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->back()->with('success', 'Mata kuliah berhasil dihapus!');
    }

}
