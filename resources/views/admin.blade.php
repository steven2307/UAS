@extends('layouts.app')

@section('content')
@auth
    <div class="container justify-content-center text-center">
        <h2 class="mt-3">Daftar Mahasiswa</h2>
        <div class="text-end">
            <a href="{{ route('tambahUser') }}" class="btn btn-primary">Tambah Mahasiswa</a>
        </div>
        <br>
        @foreach($mahasiswas->filter(function($mhs) {
            return !is_null($mhs->id_mhs);
        }) as $mhs)
        <div class="row d-flex justify-content-center">
            <div class="row d-flex align-items-center border" style="width: 800px;">
                <div class="col p-4 border-end border-3 d-flex justify-content-end">
                    <img src="{{ asset('storage/images/'.$mhs->gambar) }}" class="profile2" alt="Gambar profil">
                </div>
                <div class="col-8 text-start p-4">
                    <table>
                        <tr>
                            <td>NIM</td>
                            <td class="px-1"> : </td>
                            <td>{{ $mhs->nomor_induk }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td class="px-1"> : </td>
                            <td>{{ $mhs->name }}</td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td class="px-1"> : </td>
                            <td>{{ $mhs->jurusan }}</td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td class="px-1"> : </td>
                            <td>{{ $mhs->semester }}</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-primary">Edit Profile</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="{{ route('hapusmahasiswa', $mhs->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?');">
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
    </div>
    <div class="d-flex justify-content-center">
        {{ $mahasiswas->links() }}
    </div>
@endauth
@endsection
