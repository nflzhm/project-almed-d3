<?php

use Illuminate\Support\Facades\Route;
use App\Models\Video;

use App\Http\Controllers\IklanSliderController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MutuController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\LokerController as AdminLokerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeritaAdminController;
use App\Http\Controllers\Admin\DownloadPengadaanController as AdminPengadaanController;
use App\Http\Controllers\Admin\LayananController as AdminLayananController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\AdminDokterController;
use App\Http\Controllers\Admin\ArtikelAdminController;
use App\Http\Controllers\Admin\MutuController as AdminMutuController;
use App\Http\Controllers\Admin\FormMutuController;

Route::get('/mutu', [MutuController::class, 'index'])
    ->name('mutu');

// ── ADMIN MUTU
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('/form-mutu',              [FormMutuController::class, 'index'])  ->name('form_mutu.index');
        Route::get('/form-mutu/create',       [FormMutuController::class, 'create']) ->name('form_mutu.create');
        Route::post('/form-mutu',             [FormMutuController::class, 'store'])  ->name('form_mutu.store');
        Route::get('/form-mutu/{form_mutu}',  [FormMutuController::class, 'show'])   ->name('form_mutu.show');
        Route::get('/form-mutu/{form_mutu}/edit', [FormMutuController::class, 'edit'])   ->name('form_mutu.edit');
        Route::put('/form-mutu/{form_mutu}',      [FormMutuController::class, 'update']) ->name('form_mutu.update');
        Route::delete('/form-mutu/{form_mutu}',   [FormMutuController::class, 'destroy'])->name('form_mutu.destroy');

});


/* ================= ADMIN ================= */
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'rolelevel:admin,superadmin'])
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('dashboard');

        Route::resource('berita', BeritaAdminController::class);
        Route::resource('layanan', AdminLayananController::class);
        Route::resource('dokter', AdminDokterController::class);
        Route::resource('jadwal', JadwalController::class);
        Route::resource('artikel', ArtikelAdminController::class);
        Route::resource('banner', BannerController::class);

        Route::patch('banner/{id}/toggle', [BannerController::class, 'toggle'])
            ->name('banner.toggle');

        Route::prefix('video')
            ->name('video.')
            ->group(function () {

                Route::get('/', [VideoController::class, 'index'])
                    ->name('index');

                Route::post('/', [VideoController::class, 'store'])
                    ->name('store');

                Route::put('/{id}', [VideoController::class, 'update'])
                    ->name('update');

                Route::delete('/{id}', [VideoController::class, 'destroy'])
                    ->name('destroy');
            });

        Route::resource('loker', AdminLokerController::class);

        Route::prefix('pengguna')
            ->name('pengguna.')
            ->middleware(['role:superadmin'])
            ->group(function () {

                Route::get('/', [PenggunaController::class, 'index'])
                    ->name('index');

                Route::post('/', [PenggunaController::class, 'store'])
                    ->name('store');

                Route::put('/{id}', [PenggunaController::class, 'update'])
                    ->name('update');

                Route::delete('/{id}', [PenggunaController::class, 'destroy'])
                    ->name('destroy');
            });

        Route::get('/profile', [AdminController::class, 'profile'])
            ->name('profile');

        Route::get('/settings', [AdminController::class, 'settings'])
            ->name('settings');

        Route::prefix('pengadaan')
            ->name('pengadaan.')
            ->group(function () {

                Route::get('/', [AdminPengadaanController::class, 'index'])
                    ->name('index');

                Route::post('/', [AdminPengadaanController::class, 'store'])
                    ->name('store');

                Route::put('/{id}', [AdminPengadaanController::class, 'update'])
                    ->name('update');

                Route::delete('/{id}', [AdminPengadaanController::class, 'destroy'])
                    ->name('destroy');

                Route::get('/download/{id}', [AdminPengadaanController::class, 'download'])
                    ->name('download');
            });
    });

/* ================= USER ================= */
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
});

/* ================= PUBLIC ROUTES ================= */

Route::get('/', [IklanSliderController::class, 'index']);

Route::get('/jadwaldokter', [DokterController::class, 'index'])
    ->name('jadwaldokter');

Route::get('/layanan', [LayananController::class, 'index']);

Route::get('/loker', [LokerController::class, 'index'])
    ->name('loker.index');

Route::get('/loker/{id}', [LokerController::class, 'show'])
    ->name('loker.detail');

Route::get('/karir', [LokerController::class, 'index'])
    ->name('karir.index');

Route::get('/karir/{id}', [LokerController::class, 'show'])
    ->name('karir.detail');

Route::get('/berita', [BeritaController::class, 'index'])
    ->name('berita');

Route::get('/berita/{slug}', [BeritaController::class, 'show'])
    ->name('berita.detail');

Route::get('/artikel', [ArtikelController::class, 'index'])
    ->name('artikel');

Route::get('/artikel/{id}', [ArtikelController::class, 'show'])
    ->name('artikel.detail');

Route::get('/download', [DownloadController::class, 'index'])
    ->name('download');

Route::get('/beranda', [IklanSliderController::class, 'index'])
    ->name('beranda');

Route::get('/download/file/{id}', [DownloadController::class, 'download'])
    ->name('download.file');

Route::view('/tentang', 'tentang');
Route::view('/kontak', 'kontak');

Route::get('/video', function () {
    $videos = Video::all();
    return view('video', compact('videos'));
})->name('video');




/* ================= AUTH ================= */

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');



   

// ── Publik ────────────────────────────────────────────────
Route::get('/',        [App\Http\Controllers\IklanSliderController::class, 'index'])->name('beranda');
Route::get('/layanan', [App\Http\Controllers\LayananController::class, 'index'])->name('layanan');
// ... route publik lainnya

// ── Admin ─────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('layanan', App\Http\Controllers\Admin\LayananController::class);
});

Route::get('/jadwal-dokter', function () {
    return view('jadwaldokter');
});

Route::get('/layanan/poli/{id}', [LayananController::class, 'showPoli'])
    ->name('layanan.poli');


 