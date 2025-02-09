@extends('layouts.app')

@section('content')
@auth
    <div class="container">
        <h3>Nilai Mata Kuliah: {{ $mapel->mapel }}</h3>

        <table class="table" width="100%">
            <thead>
                <tr class="fw-bold text-center">
                    <td class="border">No.</td>
                    @if (str_contains(Auth::user()->email, '@admin.com'))
                        <td class="border">Nama Mahasiswa</td>
                    @endif
                    <td class="border">Suasana Kelas</td>
                    <td class="border">Waktu & Kehadiran</td>
                    <td class="border">Kualitas Pengajaran</td>
                    <td class="border">Tugas & Penilaian</td>
                    <td class="border">Profesionalisme</td>
                </tr>
            </thead>
            @if ($nilaiFormatted->isEmpty())
                <tr>
                    <td class="border text-center" colspan="6">Tidak Ada Nilai</td>
                </tr>
            @else
            @foreach ($nilaiFormatted as $index => $n)
            <tr>
                <td class="border text-center">{{ $loop->iteration }}</td>
                @if (str_contains(Auth::user()->email, '@admin.com'))
                    <td class="border">{{ $n['mahasiswa'] }}</td>
                @endif
                <td class="border">{{ $n['suasana_kelas'] }}</td>
                <td class="border">{{ $n['waktu_kehadiran'] }}</td>
                <td class="border">{{ $n['kualitas_pengajaran'] }}</td>
                <td class="border">{{ $n['tugas_penilaian'] }}</td>
                <td class="border">{{ $n['profesionalisme'] }}</td>
            </tr>
        @endforeach
            @endif
        </table>

        <h4>Rata-rata Penilaian</h4>
        <table>
            <tr>
                <td>Suasana Kelas dan Interaksi</td>
                <td class="px-1">:</td>
                <td class="ps-1"><strong>{{ $rataSuasanaKelasText }}</strong></td>
            </tr>
            <tr>
                <td class="pe-1">Pengelolaan Waktu dan Kehadiran</td>
                <td class="px-1">:</td>
                <td class="ps-1"><strong>{{ $rataWaktuKehadiranText }}</strong></td>
            </tr>
            <tr>
                <td>Kualitas Pengajaran dan Materi</td>
                <td class="px-1">:</td>
                <td class="ps-1"><strong>{{ $rataKualitasPengajaranText }}</strong></td>
            </tr>
            <tr>
                <td>Tugas dan Penilaian</td>
                <td class="px-1">:</td>
                <td class="ps-1"><strong>{{ $rataTugasPenilaianText }}</strong></td>
            </tr>
            <tr>
                <td>Profesionalisme Dosen</td>
                <td class="px-1">:</td>
                <td class="ps-1"><strong>{{ $rataProfesionalismeText }}</strong></td>
            </tr>
        </table>
    </div>
@endauth
@endsection
