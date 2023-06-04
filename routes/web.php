<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controller::class, 'index'])->middleware('guest')->name('landing');
Route::get('/auth', [Controller::class, 'auth'])->middleware('guest')->name('auth');
Route::post('/login', [Controller::class, 'login'])->middleware('guest')->name('login');
Route::get('/logout', [Controller::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware(['auth', 'role'])->name('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('.home');

    // Kabupaten
    Route::prefix('/kabupaten')->name('.kabupaten')->group(function () {
        Route::get('/', [AdminController::class, 'kabupaten'])->name('.index');
        Route::get('/create', [AdminController::class, 'kabupatenCreate'])->name('.create');
        Route::post('/create', [AdminController::class, 'kabupatenStore'])->name('.store');
        Route::get('/{id}/edit', [AdminController::class, 'kabupatenEdit'])->name('.edit');
        Route::post('/{id}/edit', [AdminController::class, 'kabupatenUpdate'])->name('.update');
        Route::delete('/{id}/delete', [AdminController::class, 'kabupatenDelete'])->name('.delete');
    });

    // Kecamatan
    Route::prefix('/kecamatan')->name('.kecamatan')->group(function () {
        Route::get('/', [AdminController::class, 'kecamatan'])->name('.index');
        Route::get('/create', [AdminController::class, 'kecamatanCreate'])->name('.create');
        Route::post('/create', [AdminController::class, 'kecamatanStore'])->name('.store');
        Route::get('/{id}/edit', [AdminController::class, 'kecamatanEdit'])->name('.edit');
        Route::post('/{id}/edit', [AdminController::class, 'kecamatanUpdate'])->name('.update');
        Route::delete('/{id}/delete', [AdminController::class, 'kecamatanDelete'])->name('.delete');
    });

    // Berita
    Route::prefix('/berita')->name('.berita')->group(function () {
        Route::get('/', [AdminController::class, 'berita'])->name('.index');
        Route::get('/create', [AdminController::class, 'beritaCreate'])->name('.create');
        Route::post('/create', [AdminController::class, 'beritaStore'])->name('.store');
        Route::get('/{id}/edit', [AdminController::class, 'beritaEdit'])->name('.edit');
        Route::post('/{id}/edit', [AdminController::class, 'beritaUpdate'])->name('.update');
        Route::delete('/{id}/delete', [AdminController::class, 'beritaDelete'])->name('.delete');

        // upload image ckeditor
        Route::post('/upload', [AdminController::class, 'upload'])->name('.upload');
    });
});
