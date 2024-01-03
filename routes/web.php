<?php

use App\Http\Controllers\Dashboard\SekolahController;
use App\Http\Controllers\Dashboard\TentangSekolahController;
use App\Http\Controllers\Dashboard\BidangKeahlianController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\EkskulController;
use App\Http\Controllers\Dashboard\GaleriKonsentrasiController;
use App\Http\Controllers\Dashboard\HeroSectionController;
use App\Http\Controllers\Dashboard\KonsentrasiKeahlianController;
use App\Http\Controllers\Dashboard\MapelController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\PrestasiController;
use App\Http\Controllers\Dashboard\ProgramKeahlianController;
use App\Http\Controllers\Dashboard\SambutanKepsekController;
use App\Http\Controllers\Dashboard\SocialMediaController;
use App\Http\Controllers\Dashboard\SubNavbarController;
use App\Http\Controllers\Dashboard\TenagaPendidikController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\GuruPageController;
use App\Http\Controllers\JurusanPageController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PostPageController;
use App\Http\Controllers\PrestasiPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingPageController::class, 'index'])
    ->name('home');

Route::get('/post/{kategori}', [PostPageController::class, 'index'])
    ->name('landing.post.index');

Route::get('/post/{kategori}/{post}', [PostPageController::class, 'show'])
    ->name('landing.post.show');

Route::get('/pegawai', [GuruPageController::class, 'index'])
    ->name('landing.pegawai');

Route::get('/prestasi', [PrestasiPageController::class, 'index'])
    ->name('landing.prestasi.index');

Route::get('/prestasi/{prestasi}', [PrestasiPageController::class, 'show'])
    ->name('landing.prestasi.show');

Route::get('/jurusan', [JurusanPageController::class, 'index'])
    ->name('landing.jurusan.index');

Route::get('/jurusan/{konsentrasi}', [JurusanPageController::class, 'show'])
    ->name('landing.jurusan.show');

Route::get('/profil-sekolah', [TentangSekolahController::class, 'index'])
    ->name('landing.sekolah');

Route::middleware('auth')->group(function () {
    Route::middleware('checkLevel:admin,author')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])
                ->name('dashboard');

            Route::resource('/post', PostController::class);

            Route::prefix('post')->group(function () {
                Route::get('/kategori/{kategori}', [PostController::class, 'index'])
                    ->name('post.index');

                Route::get('/{post}/status', [PostController::class, 'update_status'])
                    ->name('post.status');

                Route::post('/upload/image', [PostController::class, 'upload_image'])
                    ->name('post.upload.image');
            });

            Route::prefix('kesiswaan')->group(function () {
                Route::resource('/prestasi', PrestasiController::class);

                Route::get('/prestasi/{prestasi}/status', [PrestasiController::class, 'update_status'])
                    ->name('prestasi.status');
            });

            Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
    });

    Route::middleware('checkLevel:admin')->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::prefix('kesiswaan')->group(function () {
                Route::resource('/ekskul', EkskulController::class);
            });

            Route::resource('/guru', TenagaPendidikController::class);

            Route::prefix('guru')->group(function () {
                Route::post('/import', [TenagaPendidikController::class, 'import'])
                    ->name('guru.import');

                Route::get('/export/to-excel', [TenagaPendidikController::class, 'export'])
                    ->name('guru.export');
            });

            Route::resource('/mapel', MapelController::class);

            Route::resource('/user', UsersController::class);

            Route::resource('/sosmed', SocialMediaController::class);

            Route::resource('/sub-navbar', SubNavbarController::class);

            Route::get('/sub-navbar/{sub_navbar}/status', [SubNavbarController::class, 'update_status'])
                ->name('sub-navbar.status');

            Route::prefix('jurusan')->group(function () {
                Route::resource('/bidang', BidangKeahlianController::class);

                Route::resource('/program', ProgramKeahlianController::class);

                Route::resource('/konsentrasi', KonsentrasiKeahlianController::class);

                Route::patch('/konsentrasi/{konsentrasi}/gambar', [KonsentrasiKeahlianController::class, 'update_image'])
                    ->name('konsentrasi.gambar');

                Route::resource('/galeri', GaleriKonsentrasiController::class);
            });

            Route::get('/hero', [HeroSectionController::class, 'edit'])
                ->name('hero.edit');

            Route::patch('/hero', [HeroSectionController::class, 'update'])
                ->name('hero.update');

            Route::get('/sambutan', [SambutanKepsekController::class, 'edit'])
                ->name('sambutan.edit');

            Route::patch('/sambutan', [SambutanKepsekController::class, 'update'])
                ->name('sambutan.update');

            Route::get('/tentang', [TentangSekolahController::class, 'edit'])
                ->name('tentang.edit');

            Route::patch('/tentang', [TentangSekolahController::class, 'update'])
                ->name('tentang.update');

            Route::get('/sekolah', [SekolahController::class, 'edit'])
                ->name('sekolah.edit');

            Route::patch('/sekolah', [SekolahController::class, 'update'])
                ->name('sekolah.update');
        });
    });
});

require __DIR__ . '/auth.php';
