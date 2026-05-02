<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\IklanSliderController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\AuthController;

Route::get('/', [IklanSliderController::class, 'index']);

Route::get('/jadwaldokter', [DokterController::class, 'index']);
Route::get('/layanan', [LayananController::class, 'index']);

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show']);

Route::resource('pengadaan', PengadaanController::class);

Route::view('/tentang', 'tentang');
Route::view('/download', 'download');
Route::view('/kontak', 'kontak');
Route::view('/karir', 'karir')->name('karir');
Route::view('/video', 'video')->name('video');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('berita', BeritaController::class);
    Route::resource('layanan', LayananController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('pengadaan', PengadaanController::class);

    Route::resource('jadwal', JadwalController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('video', VideoController::class);

    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});

