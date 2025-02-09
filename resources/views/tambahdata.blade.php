@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Tambah User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('simpanUser') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="nomor_induk" class="form-label">NIM / NIDN (Opsional, untuk Mahasiswa atau Dosen)</label>
            <input type="text" class="form-control" id="nomor_induk" name="nomor_induk">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email (Gunakan @ibbi.ac.id untuk Dosen, @dmin.com untuk Admin)</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan (Opsional, untuk Mahasiswa)</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan">
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester (Opsional, untuk Mahasiswa)</label>
            <input type="number" class="form-control" id="semester" name="semester">
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Foto Profil (Opsional)</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
