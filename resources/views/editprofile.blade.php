@extends('layouts.app')

@section('content')
@auth
    <div class="container text-center">
        <h3>Edit Profil</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(isset($user->is_mahasiswa) && $user->is_mahasiswa)
            <form action="{{ route('mahasiswa.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('storage/images/' . $user->gambar) }}" class="profile2 mb-3" alt="Gambar profil">
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="row mb-3">
                            <label for="nomor_induk" class="col-md-4 col-form-label text-md-end">{{ __('NIM') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="nomor_induk" id="nomor_induk" value="{{ old('nomor_induk', $user->nomor_induk) }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jurusan" class="col-md-4 col-form-label text-md-end">{{ __('Jurusan') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $user->jurusan) }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="semester" class="col-md-4 col-form-label text-md-end">{{ __('Semester') }}</label>
                            <div class="col-md-6">
                                <input type="number" name="semester" id="semester" value="{{ old('semester', $user->semester) }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @else
            <form action="{{ route('dosen.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('storage/images/' . $user->gambar) }}" class="profile2 mb-3" alt="Gambar profil">
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="row mb-3">
                            <label for="nomor_induk" class="col-md-4 col-form-label text-md-end">{{ __('NIDN') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="nomor_induk" id="nomor_induk" value="{{ old('nomor_induk', $user->nomor_induk) }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 text-md-end">
                                <label for="gambar" class="col-form-label">{{ __('Gambar Profile') }}</label>
                            </div>
                            <div class="col-md-6">
                                <input type="file" name="gambar" id="gambar" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
@endauth
@endsection
