<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PariwisataImageController;

Route::prefix('pariwisata_images')->name('pariwisata_images.')->group(function () {
    Route::get('/', [PariwisataImageController::class, 'index'])->name('index');
    Route::get('/create', [PariwisataImageController::class, 'create'])->name('create');
    Route::post('/', [PariwisataImageController::class, 'store'])->name('store');
    Route::get('/{pariwisata_images}', [PariwisataImageController::class, 'show'])->name('show');
    Route::get('/{pariwisata_images}/edit', [PariwisataImageController::class, 'edit'])->name('edit');
    Route::put('/{pariwisata_images}', [PariwisataImageController::class, 'update'])->name('update');
    Route::patch('/{pariwisata_images}', [PariwisataImageController::class, 'update']);
    Route::delete('/{pariwisata_images}', [PariwisataImageController::class, 'destroy'])->name('destroy');
});