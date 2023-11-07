<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\IndexPostController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['auth', 'checkLevel:admin,operator'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('/post', PostController::class);

        Route::prefix('post')->group(function () {
            Route::get('/{post}/status', [PostController::class, 'update_status'])
                ->name('post.status');

            Route::get('/kategori/agenda', [IndexPostController::class, 'agenda'])
                ->name('agenda.index');
        
            Route::get('/kategori/artikel', [IndexPostController::class, 'artikel'])
                ->name('artikel.index');
        
            Route::get('/kategori/berita', [IndexPostController::class, 'berita'])
                ->name('berita.index');
        
            Route::get('/kategori/event', [IndexPostController::class, 'event'])
                ->name('event.index');
        });
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
