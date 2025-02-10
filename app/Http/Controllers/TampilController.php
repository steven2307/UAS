<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Nilai;

class TampilController extends Controller
{
    public function index()
    {
        if (str_contains(\Auth::user()->email, '@ibbi.ac.id')) {
            $user = \Auth::user();

            $mapels = Mapel::where('id_dosen', $user->id_dosen)->get();
            $dosen = $user;

            return view("dosen", compact('dosen', 'mapels'));
        }

        elseif (str_contains(\Auth::user()->email, '@admin')) {
            $mahasiswas = User::whereNotNull('id_mhs')->simplePaginate(4);

            return view('admin', compact('mahasiswas'));
        }

        else {
            $semesterMahasiswa = \Auth::user()->semester;
            $jurusanMahasiswa = \Auth::user()->jurusan;

            $mapels = Mapel::where('semester', $semesterMahasiswa)
                        ->where('jurusan', $jurusanMahasiswa)
                        ->with('dosen')
                        ->get();

            return view('mahasiswa', compact('mapels'));

        }
    }

    public function daftardosen()
    {
        if (!\Auth::check() || !str_contains(\Auth::user()->email, '@admin')) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin.');
        }
        $dosens = User::whereNotNull('id_dosen')->simplePaginate(2);
        return view('daftardosen', compact('dosens'));

    }

    public function halamanDosen(Request $request, $id_dosen = null)
    {
        if (!\Auth::check()) {
            abort(403, 'Akses ditolak. Anda harus login.');
        }

        $user = \Auth::user();
        $userEmail = $user->email;

        if (str_contains($userEmail, '@ibbi.ac.id')) {
            $mapels = Mapel::where('id_dosen', $user->id_dosen)->get();
            $dosen = $user;
        }

        else if (str_contains($userEmail, '@admin.com')) {
            if (!$id_dosen) {
                return redirect()->route('daftardosen')->with('error', 'Silakan pilih dosen terlebih dahulu.');
            }
            $dosen = User::where('id_dosen', $id_dosen)->first();
            if (!$dosen) {
                abort(404, 'Dosen tidak ditemukan.');
            }
            $mapels = Mapel::where('id_dosen', $id_dosen)->get();
        }

        else {
            abort(403, 'Akses ditolak. Halaman ini hanya untuk dosen dan admin.');
        }

        return view('dosen', compact('mapels', 'dosen'));
    }

    public function daftarmapel()
    {
        if (!\Auth::check() || !str_contains(\Auth::user()->email, '@admin')) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin.');
        }
        $mapels = Mapel::with('dosen')->orderBy('semester', 'asc')->simplePaginate(10);
        return view('daftarmapel', compact('mapels'));
    }

    public function lihatNilai($mapelId)
    {
        $mapel = Mapel::findOrFail($mapelId);

        if (\Auth::user()->email && str_contains(\Auth::user()->email, '@admin')) {
            $nilai = Nilai::with('mahasiswa', 'dosen')
                ->where('id_mapel', $mapelId)
                ->get();
        } else {

            $dosen = \Auth::user();
            $nilai = Nilai::with('mahasiswa')
                ->where('id_mapel', $mapelId)
                ->where('id_dosen', $dosen->id)
                ->get();
        }

        $nilaiFormatted = $nilai->map(function ($n) {
            return [
                'suasana_kelas' => $this->konversiNilai($n->suasana_kelas),
                'waktu_kehadiran' => $this->konversiNilai($n->waktu_kehadiran),
                'kualitas_pengajaran' => $this->konversiNilai($n->kualitas_pengajaran),
                'tugas_penilaian' => $this->konversiNilai($n->tugas_penilaian),
                'profesionalisme' => $this->konversiNilai($n->profesionalisme),
                'mahasiswa' => $n->mahasiswa->name,
            ];
        });

        $rataSuasanaKelas = $nilai->avg('suasana_kelas');
        $rataWaktuKehadiran = $nilai->avg('waktu_kehadiran');
        $rataKualitasPengajaran = $nilai->avg('kualitas_pengajaran');
        $rataTugasPenilaian = $nilai->avg('tugas_penilaian');
        $rataProfesionalisme = $nilai->avg('profesionalisme');

        $rataSuasanaKelasText = $this->konversiRataRata($rataSuasanaKelas);
        $rataWaktuKehadiranText = $this->konversiRataRata($rataWaktuKehadiran);
        $rataKualitasPengajaranText = $this->konversiRataRata($rataKualitasPengajaran);
        $rataTugasPenilaianText = $this->konversiRataRata($rataTugasPenilaian);
        $rataProfesionalismeText = $this->konversiRataRata($rataProfesionalisme);

        return view('lihatnilai', compact(
            'mapel', 'nilaiFormatted',
            'rataSuasanaKelasText', 'rataWaktuKehadiranText',
            'rataKualitasPengajaranText', 'rataTugasPenilaianText',
            'rataProfesionalismeText'
        ));
    }

    private function konversiNilai($angka)
    {
        switch ($angka) {
            case 1: return 'Sangat Buruk';
            case 2: return 'Buruk';
            case 3: return 'Biasa';
            case 4: return 'Baik';
            case 5: return 'Sangat Baik';
            default: return '-';
        }
    }

    private function konversiRataRata($nilai)
    {
        if ($nilai < 1) {
            return 'Tidak Ada Nilai';
        } elseif ($nilai < 2) {
            return 'Sangat Buruk';
        } elseif ($nilai < 3) {
            return 'Buruk';
        } elseif ($nilai < 4) {
            return 'Biasa';
        } elseif ($nilai < 5) {
            return 'Baik';
        } else {
            return 'Sangat Baik';
        }
    }

    public function editdosen($id)
    {
        $user = User::findOrFail($id);

        if (\Auth::user()->id !== $user->id && !str_contains(\Auth::user()->email, '@admin')) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin.');
        }

        return view('editprofile', compact('user'));
    }

    public function updatedosen(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (!str_contains(\Auth::user()->email, '@admin')) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nomor_induk' => 'required|string|max:20',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user->update($validated);

        if ($request->hasFile('gambar')) {
            if ($user->gambar) {
                $gambarLama = "images/{$user->gambar}";
                if (Storage::disk('public')->exists($gambarLama)) {
                    Storage::disk('public')->delete($gambarLama);
                }
            }

            $filename = $request->file('gambar')->hashName();
            $request->file('gambar')->storeAs('images', $filename, 'public');
            $user->gambar = $filename;
        }

        return redirect()->route('dosen.edit', $user->id)->with('success', 'Profil berhasil diperbarui.');
    }

    public function hapusdosen($id)
    {
        $dosen = User::findOrFail($id);
        $dosen->delete();

        return redirect()->route('daftardosen')->with('success', 'Dosen berhasil dihapus.');
    }

    public function editmahasiswa($id)
    {
        $user = User::findOrFail($id);

        if (\Auth::user()->id !== $user->id && !str_contains(\Auth::user()->email, '@admin')) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin.');
        }

        return view('editprofile', compact('user'));
    }

    public function updatemahasiswa(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (!str_contains(\Auth::user()->email, '@admin') && \Auth::user()->id !== $user->id) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nomor_induk' => 'required|string|max:20',
            'semester' => 'required|integer|max:20',
            'jurusan' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user->update([
            'name' => $validated['name'],
            'nomor_induk' => $validated['nomor_induk'],
            'semester' => $validated['semester'],
            'jurusan' => $validated['jurusan'],
        ]);
        if ($request->hasFile('gambar')) {
            if ($user->gambar) {
                $gambarLama = "images/{$user->gambar}";
                if (Storage::disk('public')->exists($gambarLama)) {
                    Storage::disk('public')->delete($gambarLama);
                }
            }

            $filename = $request->file('gambar')->hashName();
            $request->file('gambar')->storeAs('images', $filename, 'public');

            $user->gambar = $filename;
        }

        return redirect()->route('mahasiswa.edit', $user->id)->with('success', 'Profil berhasil diperbarui.');
    }

    public function hapusmahasiswa($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Mahasiswa berhasil dihapus.');
    }

    public function create()
    {
        return view('tambahdata');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nomor_induk' => 'nullable|string|unique:users,nomor_induk',
            'jurusan' => 'nullable|string',
            'semester' => 'nullable|integer',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('images', 'public');
        }

        if (str_contains($request->email, '@ibbi.ac.id')) {
            $id_dosen = User::max('id') + 1;
            $id_mhs = null;
        } elseif (str_contains($request->email, '@admin.com')) {
            $id_dosen = null;
            $id_mhs = null;
        } else {
            $id_dosen = null;
            $id_mhs = User::max('id') + 1;
        }

        User::create([
            'name' => $request->name,
            'nomor_induk' => $request->nomor_induk,
            'jurusan' => $request->jurusan,
            'semester' => $request->semester,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gambar' => $gambarPath,
            'id_dosen' => $id_dosen,
            'id_mhs' => $id_mhs,
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }

}
