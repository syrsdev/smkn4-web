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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('/dashboard/post', PostController::class);

    Route::get('/dashboard/post/kategori/agenda', [IndexPostController::class, 'agenda'])
        ->name('agenda.index');

    Route::get('/dashboard/post/kategori/artikel', [IndexPostController::class, 'artikel'])
        ->name('artikel.index');

    Route::get('/dashboard/post/kategori/berita', [IndexPostController::class, 'berita'])
        ->name('berita.index');

    Route::get('/dashboard/post/kategori/event', [IndexPostController::class, 'event'])
        ->name('event.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
