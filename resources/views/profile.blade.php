@extends('layouts.app')

@section('content')
@auth
    <div class="container text-center">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-center">
            @if (empty(Auth::user()->gambar))
                <img src="" class="profile2" alt="Gambar profil">
            @else
                <img src={{ asset('storage/images/' . Auth::user()->gambar) }} class="profile2">
            @endif
        </div>
        <br>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row mb-3">
                    @if (empty(Auth::user()->id_mhs))
                        <label for="nomor_induk" class="col-md-4 col-form-label text-md-end">{{ __('NIDN') }}</label>
                    @else
                        <label for="nomor_induk" class="col-md-4 col-form-label text-md-end">{{ __('NIM') }}</label>
                    @endif

                    <div class="col-md-6">
                        @if (!empty(Auth::user()->id_mhs) && empty(Auth::user()->nomor_induk))
                            <input type="text" name="nomor_induk" id="nomor_induk" class="form-control" placeholder="Input NIM" required>
                        @elseif (!empty(Auth::user()->id_mhs) && !empty(Auth::user()->nomor_induk))
                            <input type="text" name="nomor_induk" id="nomor_induk" class="form-control" value="{{ Auth::user()->nomor_induk }}" required>
                        @elseif (empty(Auth::user()->id_mhs) && empty(Auth::user()->nomor_induk))
                            <input type="text" name="nomor_induk" id="nomor_induk" class="form-control" placeholder="Input NIDN" required>
                        @elseif (empty(Auth::user()->id_mhs) && !empty(Auth::user()->nomor_induk))
                            <input type="text" name="nomor_induk" id="nomor_induk" class="form-control" value="{{ Auth::user()->nomor_induk }}" required>
                        @endif
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                    <div class="col-md-6">
                        <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
                    </div>
                </div>

                @if (!empty(Auth::user()->id_mhs) && empty(Auth::user()->jurusan) && empty(Auth::user()->semester))
                    <div class="row mb-3">
                        <label for="jurusan" class="col-md-4 col-form-label text-md-end">{{ __('Jurusan') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="Input Jurusan" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="semester" class="col-md-4 col-form-label text-md-end">{{ __('Semester') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="semester" id="semester" class="form-control" placeholder="Input Semester" required>
                        </div>
                    </div>

                @elseif (!empty(Auth::user()->id_mhs) && !empty(Auth::user()->jurusan) && !empty(Auth::user()->semester))
                    <div class="row mb-3">
                        <label for="jurusan" class="col-md-4 col-form-label text-md-end">{{ __('Jurusan') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ Auth::user()->jurusan }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="semester" class="col-md-4 col-form-label text-md-end">{{ __('Semester') }}</label>

                        <div class="col-md-6">
                            <input type="text" name="semester" id="semester" class="form-control" value="{{ Auth::user()->semester }}" required>
                        </div>
                    </div>

                @else

                @endif

                <div class="row mb-3">
                    <label for="gambar" class="col-md-4 col-form-label text-md-end">{{ __('Gambar Profile') }}</label>

                    <div class="col-md-6">
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                </div>

                <div class="row mb-0  justify-content-center">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>


            </div>
        </div>
        </form>
    </div>
@endauth
@endsection
