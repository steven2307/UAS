@extends('layouts.app')

@section('content')
@auth
    <div class="container text-center">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <br>
        <form action="{{ isset($mapel) ? route('mapel.update', $mapel->id) : route('mapel.simpan') }}" method="POST">
            @csrf
            @if(isset($mapel))
                @method('PUT')
            @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama Dosen') }}</label>
                    <div class="col-md-6">
                        <select name="id_dosen" id="dosen_id" class="form-control">
                            <option value="">-- Pilih Dosen --</option>
                            @foreach ($dosens as $dosen)
                                <option value="{{ $dosen->id_dosen }}" {{ isset($mapel) && $mapel->id_dosen == $dosen->id_dosen ? 'selected' : '' }}>
                                    {{ $dosen->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="jurusan" class="col-md-4 col-form-label text-md-end">{{ __('Jurusan') }}</label>
                    <div class="col-md-6">
                        <select name="jurusan" id="jurusan" class="form-control">
                            <option value="">-- Pilih Jurusan --</option>
                            <option value="Sistem Informasi" {{ isset($mapel) && $mapel->jurusan == 'Sistem Informasi' ? 'selected' : '' }}>Sistem Informasi</option>
                            <option value="Teknik Informasi" {{ isset($mapel) && $mapel->jurusan == 'Teknik Informasi' ? 'selected' : '' }}>Teknik Informasi</option>
                            <option value="Akuntansi" {{ isset($mapel) && $mapel->jurusan == 'Akuntansi' ? 'selected' : '' }}>Akuntansi</option>
                            <option value="Manajemen" {{ isset($mapel) && $mapel->jurusan == 'Manajemen' ? 'selected' : '' }}>Manajemen</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="mapel" class="col-md-4 col-form-label text-md-end">{{ __('Mapel') }}</label>
                    <div class="col-md-6">
                        <input type="text" name="mapel" id="mapel" class="form-control" placeholder="Input Nama Mata Kuliah"
                            value="{{ old('mapel', isset($mapel) ? $mapel->mapel : '') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="semester" class="col-md-4 col-form-label text-md-end">{{ __('Semester') }}</label>
                    <div class="col-md-6">
                        <input type="number" name="semester" id="semester" class="form-control" placeholder="Input Semester"
                            value="{{ old('semester', isset($mapel) ? $mapel->semester : '') }}" required>
                    </div>
                </div>

                <div class="row mb-0 justify-content-center">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">
                            {{ isset($mapel) ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endauth
@endsection
