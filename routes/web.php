<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\DokterController;

Route::get('/jadwaldokter', [DokterController::class, 'index']);
Route::get('/layanan', [LayananController::class, 'index']);
Route::get('/berita', [BeritaController::class, 'index']);


Route::get('/', function () {
    return view('beranda');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/download', function () {
    return view('download');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/pengadaan', function () {
    return view('pengadaan');
})->name('pengadaan');

Route::get('/karir', function () {
    return view('karir');
})->name('karir');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');

Route::get('/video', function () {
    return view('video');
})->name('video');

