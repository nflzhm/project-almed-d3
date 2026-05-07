<?php

use Illuminate\Support\Facades\Route;
use App\Models\Video;

use App\Http\Controllers\IklanSliderController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\LokerController as AdminLokerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeritaAdminController;
use App\Http\Controllers\Admin\DownloadPengadaanController as AdminPengadaanController;
use App\Http\Controllers\Admin\LayananController as AdminLayananController;

/* =========================
   FRONTEND ROUTES
========================= */

Route::get('/', [IklanSliderController::class, 'index']);

Route::get('/jadwaldokter', [DokterController::class, 'index']);
Route::get('/layanan', [LayananController::class, 'index']);

/* =========================
   LOKER / KARIR (FIXED CLEAN)
========================= */

// INDEX
Route::get('/loker', [LokerController::class, 'index'])
    ->name('loker.index');

// DETAIL
Route::get('/loker/{id}', [LokerController::class, 'show'])
    ->name('loker.detail');

    // KARIR INDEX
Route::get('/karir', [LokerController::class, 'index'])
    ->name('karir.index');

// KARIR DETAIL
Route::get('/karir/{id}', [LokerController::class, 'show'])
    ->name('karir.detail');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show']);

Route::get('/pengadaan', [PengadaanController::class, 'index'])->name('pengadaan');

Route::get('/download', [DownloadController::class, 'index'])->name('download');
Route::get('/download/file/{id}', [DownloadController::class, 'download'])->name('download.file');

Route::view('/tentang', 'tentang');
Route::view('/kontak', 'kontak');

/* =========================
   VIDEO
========================= */

Route::get('/video', function () {
    $videos = Video::all();
    return view('video', compact('videos'));
})->name('video');

/* =========================
   AUTH
========================= */

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* =========================
   ADMIN
========================= */

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('berita', BeritaAdminController::class);
    Route::resource('layanan', AdminLayananController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('banner', BannerController::class);

    Route::patch('banner/{id}/toggle', [BannerController::class, 'toggle'])
        ->name('banner.toggle');

    Route::prefix('video')->name('video.')->group(function () {
        Route::get('/', [VideoController::class, 'index'])->name('index');
        Route::post('/', [VideoController::class, 'store'])->name('store');
        Route::put('/{id}', [VideoController::class, 'update'])->name('update');
        Route::delete('/{id}', [VideoController::class, 'destroy'])->name('destroy');
    });

    Route::resource('loker', AdminLokerController::class);

    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');

    Route::prefix('pengadaan')->name('pengadaan.')->group(function () {
        Route::get('/', [AdminPengadaanController::class, 'index'])->name('index');
        Route::post('/', [AdminPengadaanController::class, 'store'])->name('store');
        Route::put('/{id}', [AdminPengadaanController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminPengadaanController::class, 'destroy'])->name('destroy');
        Route::get('/download/{id}', [AdminPengadaanController::class, 'download'])->name('download');
    });

});