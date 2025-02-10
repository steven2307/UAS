<?php

use App\Http\Controllers\TampilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware("auth")->group(function () {
    Route::get('/', [TampilController::class, 'index']);

    Route::get('/daftardosen', [TampilController::class, 'daftardosen'])->name('daftardosen');
    Route::get('/dosen/{id_dosen?}', [TampilController::class, 'halamanDosen'])->name('halamanDosen');

    Route::get('dosenedit/{id}', [TampilController::class, 'editdosen'])->name('dosen.edit');
    Route::put('dosenedit/{id}', [TampilController::class, 'updatedosen'])->name('dosen.update');
    Route::delete('/daftardosen/{id}', [TampilController::class, 'hapusdosen'])->name('hapusdosen');

    Route::get('mahasiswa/{id}', [TampilController::class, 'editmahasiswa'])->name('mahasiswa.edit');
    Route::put('mahasiswa/{id}', [TampilController::class, 'updatemahasiswa'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{id}', [TampilController::class, 'hapusmahasiswa'])->name('hapusmahasiswa');

    Route::get('/daftarmapel', [TampilController::class, 'daftarmapel'])->name('daftarmapel');
    Route::get('/lihatnilai/{id_mapel}', [TampilController::class, 'lihatnilai'])->name('lihatnilai');

    Route::get('/user/tambah', [TampilController::class, 'create'])->name('tambahUser');
    Route::post('/user/simpan', [TampilController::class, 'store'])->name('simpanUser');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/matkul', [MapelController::class, 'tambah'])->name('mapel.tambah');
    Route::post('/matkul', [MapelController::class, 'simpan'])->name('mapel.simpan');

    Route::get('/matkul/edit/{id}', [MapelController::class, 'edit'])->name('mapel.edit');
    Route::put('/matkul/update/{id}', [MapelController::class, 'update'])->name('mapel.update');
    Route::delete('/mapel/hapus/{id}', [MapelController::class, 'destroy'])->name('mapel.hapus');

    Route::get('/nilai/{id}', [NilaiController::class, 'show']);
    Route::post('/nilai/{id}', [NilaiController::class, 'store']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
