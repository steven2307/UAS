@extends('layouts.app')

@section('content')
@auth
    <div class="container justify-content-center text-center">
        <h2 class="mt-3">Daftar Dosen</h2>
        <div class="text-end">
            <a href="{{ route('tambahUser') }}" class="btn btn-primary">Tambah Dosen</a>
        </div>
        <br>
        @if($dosens->isEmpty())
            <p>Data Dosen Tidak Terisi.</p>
        @else
            @foreach($dosens as $dosen)
                <div class="row d-flex justify-content-center">
                    <div class="row d-flex align-items-center border" style="width: 800px;">
                        <div class="col p-4 border-end border-3 d-flex justify-content-end">
                            <img src="{{ asset('storage/images/'.$dosen->gambar) }}" class="profile2" alt="Gambar profil">
                        </div>
                        <div class="col-8 text-start p-4">
                            <table>
                                <tr>
                                    <td>NIDN</td>
                                    <td class="px-1">:</td>
                                    <td>{{ $dosen->nomor_induk }}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td class="px-1">:</td>
                                    <td>{{ $dosen->name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-primary">Edit Profile</a>
                                    </td>
                                    <td colspan="2">
                                        <a href="{{ route('halamanDosen', $dosen->id_dosen) }}" class="btn btn-primary">Lihat Mata Kuliah</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="{{ route('hapusdosen', $dosen->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dosen ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <br><br>
            @endforeach
        @endif
    </div>
    <div class="d-flex justify-content-center">
        {{ $dosens->links() }}
    </div>
@endauth
@endsection
