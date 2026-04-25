<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/layanan', function () {
    return view('layanan');
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

Route::get('/berita', function () {
    return view('berita');
})->name('berita');

Route::get('/video', function () {
    return view('video');
})->name('video');

Route::get('/jadwaldokter', function () {
    return view('jadwaldokter');
});