@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-3 text-center">Daftar Mata Kuliah</h2>
    <div class="text-end">
        <a href="{{ route('mapel.tambah') }}" class="btn btn-primary">Tambah Matkul</a>
    </div>
    <br>
    @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <br>
    <table class="table text-center">
        <thead class="table">
            <tr>
                <th class="border">No.</th>
                <th class="border">Nama Mata Kuliah</th>
                <th class="border">Semester</th>
                <th class="border">Jurusan</th>
                <th class="border">Nama Dosen</th>
                <th style="border:none;"></th>
            </tr>
        </thead>
        <tbody>
            @if ($mapels->isEmpty())
                <tr>
                    <td colspan="5" class="text-center">Tidak ada mata kuliah tersedia.</td>
                </tr>
            @else
                @foreach ($mapels as $index => $mapel)
                    <tr>
                        <td class="border">{{ $mapels->firstItem() + $index }}</td>
                        <td class="border">{{ $mapel->mapel }}</td>
                        <td class="border">{{ $mapel->semester }}</td>
                        <td class="border">{{ $mapel->jurusan }}</td>
                        <td class="border">{{ $mapel->dosen->name ?? 'Tidak ada data dosen' }}</td>
                        <td style="border:none;">
                            <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            <form action="{{ route('mapel.hapus', $mapel->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $mapels->links() }}
    </div>
</div>
@endsection
