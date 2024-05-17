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
use App\Http\Controllers\Dashboard\ThemeSettingController;
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

// Route untuk Landing Page
Route::get('/', [LandingPageController::class, 'index'])
    ->name('home'); // Ke Landing Page

Route::get('/post/{kategori}', [PostPageController::class, 'index'])
    ->name('landing.post.index'); // Ke Halaman Posts

Route::get('/post/{kategori}/{post}', [PostPageController::class, 'show'])
    ->name('landing.post.show'); // Ke Datail Post

Route::get('/pegawai', [GuruPageController::class, 'index'])
    ->name('landing.pegawai'); // Ke Halaman Guru/Tenaga Pendidik

Route::get('/prestasi', [PrestasiPageController::class, 'index'])
    ->name('landing.prestasi.index'); // Ke Halaman Prestasi

Route::get('/prestasi/{prestasi}', [PrestasiPageController::class, 'show'])
    ->name('landing.prestasi.show'); // Ke Halaman Detail Prestasi

Route::get('/jurusan', [JurusanPageController::class, 'index'])
    ->name('landing.jurusan.index'); // Ke Halaman Jurusan/Konsentrasi Keahlian

Route::get('/jurusan/{konsentrasi}', [JurusanPageController::class, 'show'])
    ->name('landing.jurusan.show'); // Ke Halaman Detail Jurusan/Konsentrasi Keahlian

Route::get('/profil-sekolah', [TentangSekolahController::class, 'index'])
    ->name('landing.sekolah'); // Ke Halaman Tentang Sekolah

// Route untuk Dashboard

// Middleware - Auth
// Route ini hanya bisa diakses oleh user yang sudah login
Route::middleware('auth')->group(function () {

    // Middleware - Check Level: Admin & Author
    // Route ini bisa diakses oleh Admin maupun Author
    Route::middleware('checkLevel:admin,author')->group(function () {

        // Prefix: Dashboard
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])
                ->name('dashboard'); // Ke Halaman Dashboard

            Route::resource('/post', PostController::class)
                ->except('index'); // Route Resource Post (pengecualian untuk index)

            // Prefix: Post
            Route::prefix('post')->group(function () {
                Route::get('/kategori/{kategori}', [PostController::class, 'index'])
                    ->name('post.index'); // Route Post: index dengan wildcard kategori

                Route::get('/{post}/status', [PostController::class, 'update_status'])
                    ->name('post.status'); // Update status Post (Publih/Unpublish)

                Route::post('/upload/image', [PostController::class, 'upload_image'])
                    ->name('post.upload.image'); // Upload gambar di isi konten Post (Berlaku juga untuk Prestasi)
            });

            // Prefix: Kesiswaan
            Route::prefix('kesiswaan')->group(function () {
                Route::resource('/prestasi', PrestasiController::class); // Prestasi Route: Resource

                Route::get('/prestasi/{prestasi}/status', [PrestasiController::class, 'update_status'])
                    ->name('prestasi.status'); // Update status Prestasi (Publih/Unpublish)
            });

            // Profile User
            Route::get('/profile', [ProfileController::class, 'index'])
                ->name('profile.index'); // Ke Halaman Profile User

            Route::patch('/profile', [ProfileController::class, 'update'])
                ->name('profile.update'); // Update Profile

            Route::delete('/profile', [ProfileController::class, 'destroy'])
                ->name('profile.destroy'); // Delete Profile *belum bisa digunakan melalui frontend dashboard
        });
    });

    // Middleware - Check Level: Admin
    // Route ini hanya bisa diakses oleh Admin
    Route::middleware('checkLevel:admin')->group(function () {

        // Prefix: Dashboard
        Route::prefix('dashboard')->group(function () {

            // Prefix: Kesiswaan
            Route::prefix('kesiswaan')->group(function () {
                Route::resource('/ekskul', EkskulController::class); // Route Resource Ekskul
            });

            Route::resource('/guru', TenagaPendidikController::class); // Route Resource Guru/Tenaga Pendidik

            // Prefix: Guru
            Route::prefix('guru')->group(function () {
                Route::post('/import', [TenagaPendidikController::class, 'import'])
                    ->name('guru.import'); // Import/upload file excel ke data Guru

                Route::get('/export/to-excel', [TenagaPendidikController::class, 'export'])
                    ->name('guru.export'); // Export/download file excel dari data Guru 
            });

            Route::resource('/mapel', MapelController::class); // Route Resource Mapel (Mata Pelajaran)

            Route::resource('/user', UsersController::class); // Route Resource User

            Route::resource('/sosmed', SocialMediaController::class); // Route Resource Social media

            Route::resource('/sub-navbar', SubNavbarController::class); // Route Resource Sub-Navbar

            Route::get('/sub-navbar/{sub_navbar}/status', [SubNavbarController::class, 'update_status'])
                ->name('sub-navbar.status'); // Update status Sub-Navbar (Show/Hide)

            // Prefix: Jurusan
            Route::prefix('jurusan')->group(function () {
                Route::resource('/bidang', BidangKeahlianController::class); // Route Resource Bidang Keahlian

                Route::resource('/program', ProgramKeahlianController::class); // Route Resource Program Keahlian

                Route::resource('/konsentrasi', KonsentrasiKeahlianController::class); // Route Resource Konsentrasi Keahlian

                // Route Resource Galeri Konsentrasi Keahlian
                /* Isi konten Konsentrasi Keahlian tidak bisa ditambahkan (upload) gambar,
                kami menggunakan route ini sebagai alternatifnya */
                Route::resource('/galeri', GaleriKonsentrasiController::class);
            });

            // Content Management System (CMS)

            // Hero Section/Jumbotron
            Route::get('/hero', [HeroSectionController::class, 'edit'])
                ->name('hero.edit');

            Route::patch('/hero', [HeroSectionController::class, 'update'])
                ->name('hero.update');

            // Sambutan Kepala Sekolah
            Route::get('/sambutan', [SambutanKepsekController::class, 'edit'])
                ->name('sambutan.edit');

            Route::patch('/sambutan/{sambutan}', [SambutanKepsekController::class, 'update'])
                ->name('sambutan.update');

            // Tentang Sekolah
            Route::get('/tentang', [TentangSekolahController::class, 'edit'])
                ->name('tentang.edit');

            Route::patch('/tentang', [TentangSekolahController::class, 'update'])
                ->name('tentang.update');

            // Profile Sekolah
            Route::get('/sekolah', [SekolahController::class, 'edit'])
                ->name('sekolah.edit');

            Route::patch('/sekolah', [SekolahController::class, 'update'])
                ->name('sekolah.update');

            // Tema Website
            Route::get('/tema-website', [ThemeSettingController::class, 'edit'])
                ->name('tema.edit');

            Route::patch('/tema-website', [ThemeSettingController::class, 'update'])
                ->name('tema.update');
        });
    });
});

require __DIR__ . '/auth.php';
