<?php
use Illuminate\Support\Facades\Route;

Route::redirect('/home', '/');
// Redirect permanen (kode 301)
Route::permanentRedirect('/katalog-lama', '/info');
// Dieksekusi bila tidak ada route yang cocok (letakkan paling bawah)
Route::fallback(function () {
return response('Maaf, halaman yang Anda cari tidak tersedia.', 404);
});

use App\Http\Controllers\MahasiswaController;

Route::get('/profil', [MahasiswaController::class, 'profil'])->name('mahasiswa.profil');
Route::get('/mahasiswa', [MahasiswaController::class, 'daftar'])->name('mahasiswa.daftar');
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'detail'])->name('mahasiswa.detail');