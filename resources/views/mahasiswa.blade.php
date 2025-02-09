@extends('layouts.app')

@section('content')
@auth
    <div class="container text-center">
        <div class="row">
            <div class="col border-end border-3">
                <h3>Data Diri Mahasiswa/i</h3>
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('storage/images/'.Auth::user()->gambar) }}" class="profile" alt="Gambar profil">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <table style="width: 200px;" class="text-start">
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            @if (empty(Auth::user()->nomor_induk))
                                <td>Belum Terisi</td>
                            @else
                                <td>{{ Auth::user()->nomor_induk }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            @if (empty(Auth::user()->jurusan))
                                <td>Belum Terisi</td>
                            @else
                                <td>{{ Auth::user()->jurusan }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>Semester</td>
                            <td>:</td>
                            @if (empty(Auth::user()->semester))
                                <td>Belum Terisi</td>
                            @else
                                <td>{{ Auth::user()->semester }}</td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-9">
            <h3>Daftar Mata Kuliah</h3>
            @if (!empty(Auth::user()->nomor_induk) && !empty(Auth::user()->jurusan) && !empty(Auth::user()->semester))
                <div class="row">
                    @foreach ($mapels as $index => $mapel)
                        @if ($index % 3 == 0 && $index != 0)
                    </div>
                    <div class="row">
                        @endif
                        <div class="col-md-4 mb-3">
                            <div class="card text-center">
                                <img src="{{ asset('storage/images/'.$mapel->dosen->gambar) }}" class="profile mx-auto d-block mt-3" alt="Foto Profile">
                                <div class="card-body">
                                <table width="100%" class="text-start">
                                    <tr>
                                        <td>Nama Dosen</td>
                                        <td>:</td>
                                        <td>{{ $mapel->dosen->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Matkul</td>
                                        <td>:</td>
                                        <td>{{ $mapel->mapel }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jurusan</td>
                                        <td>:</td>
                                        <td>{{ $mapel->jurusan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Semester</td>
                                        <td>:</td>
                                        <td>{{ $mapel->semester }}</td>
                                    </tr>
                                </table>
                                <br>
                                    <a href="nilai/{{ $mapel->id }}" class="btn btn-primary">Beri Nilai</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @else
                <h2>Lengkapi data diri untuk proses lebih lanjut.</h2>
            @endif
        </div>
    </div>
@endauth
@endsection
