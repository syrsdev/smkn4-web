<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\EkskulController;
use App\Http\Controllers\Dashboard\IndexPostController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\PrestasiController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PostPageController;
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
    ->name('post');

Route::middleware(['auth', 'checkLevel:admin,operator'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('/post', PostController::class);

        Route::prefix('post')->group(function () {
            Route::get('/{post}/status', [PostController::class, 'update_status'])
                ->name('post.status');

            Route::post('/upload/image', [PostController::class, 'upload_image'])
                ->name('post.upload.image');

            Route::get('/kategori/agenda', [IndexPostController::class, 'agenda'])
                ->name('agenda.index');
        
            Route::get('/kategori/artikel', [IndexPostController::class, 'artikel'])
                ->name('artikel.index');
        
            Route::get('/kategori/berita', [IndexPostController::class, 'berita'])
                ->name('berita.index');
        
            Route::get('/kategori/event', [IndexPostController::class, 'event'])
                ->name('event.index');
        });

        Route::prefix('kesiswaan')->group(function () {
            Route::resource('/prestasi', PrestasiController::class);

            Route::resource('/ekskul', EkskulController::class);
        });
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
