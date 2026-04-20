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