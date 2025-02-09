@extends('layouts.app')

@section('content')
@auth
    <div class="container text-center">
        <div class="row">
            <div class="col border-end border-3">
                <h3>Data Dosen</h3>
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('storage/images/'.$dosen->gambar) }}" class="profile" alt="Gambar profil">
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <table style="width: 220px;" class="text-start">
                        <tr>
                            <td>NIDN</td>
                            <td class="px-1">:</td>
                            <td class="ps-1">{{ $dosen->nomor_induk ?? 'Belum Terisi' }}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td class="px-1">:</td>
                            <td class="ps-1">{{ $dosen->name }}</td>
                        </tr>
                        @if (str_contains(Auth::user()->email, '@admin.com'))
                        <tr>
                            <td>
                                <form action="{{ route('hapusdosen', $dosen->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dosen ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                            <td colspan="2">
                                <a href="{{ route('daftardosen') }}" class="btn btn-primary">Lihat Dosen Lain</a>
                            </td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>

            <div class="col-9">
                <h3>Daftar Mata Kuliah</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="border">Nama Mata Kuliah</th>
                            <th class="border">Semester</th>
                            <th class="border">Jurusan</th>
                            @if (str_contains(Auth::user()->email, '@admin.com'))
                                <th class="border">Nama Dosen</th>
                            @endif
                            <th style="border:none;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $mapels = $mapels->sortBy('semester'); // Sorting secara ascending berdasarkan kolom 'semester'
                        @endphp

                        @foreach ($mapels as $mapel)
                            <tr>
                                <td class="border">{{ $mapel->mapel }}</td>
                                <td class="border">{{ $mapel->semester }}</td>
                                <td class="border">{{ $mapel->jurusan }}</td>
                                @if (str_contains(Auth::user()->email, '@admin.com'))
                                    <td class="border">{{ $dosen->name }}</td>
                                @endif
                                <td style="border:none;">
                                    <a href="{{ route('lihatnilai', $mapel->id) }}" class="btn btn-primary">Lihat Nilai</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endauth
@endsection
