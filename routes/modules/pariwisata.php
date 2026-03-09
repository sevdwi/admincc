<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PariwisataController;

Route::prefix('pariwisata')->name('pariwisata.')->group(function () {
    Route::get('/', [PariwisataController::class, 'index'])->name('index');
    Route::get('/{pariwisata}/images', [PariwisataController::class, 'data_images'])->name('images');
    Route::get('/tambah_images/{id}', [PariwisataController::class, 'data_images_crt'])->name('data_images.create');
    Route::post('/simpan_images', [PariwisataController::class, 'data_images_store'])
    ->name('data_images.store');
    Route::get('/create', [PariwisataController::class, 'create'])->name('create');
    Route::post('/', [PariwisataController::class, 'store'])->name('store');
    Route::get('/{pariwisata}', [PariwisataController::class, 'show'])->name('show');
    Route::get('/{pariwisata}/edit', [PariwisataController::class, 'edit'])->name('edit');
    Route::put('/{pariwisata}', [PariwisataController::class, 'update'])->name('update');
    Route::patch('/{pariwisata}', [PariwisataController::class, 'update']);
    Route::delete('/{pariwisata}', [PariwisataController::class, 'destroy'])->name('destroy');
});