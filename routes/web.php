<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PariwisataController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});


// user CRUD
// Route::resource('users', UserController::class);

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::patch('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// login / logout
Route::get('/login', [UserController::class,'loginForm'])->name('login');
Route::post('/login', [UserController::class,'login']);
Route::post('/logout', [UserController::class,'logout'])->name('logout');

// dashboard karna kita pakai auth
Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/pariwisata', [PariwisataController::class, 'index'])->name('pariwisata.index');
    Route::get('/pariwisata/create', [PariwisataController::class, 'create'])->name('pariwisata.create');
    Route::post('/pariwisata', [PariwisataController::class, 'store'])->name('pariwisata.store');
    Route::get('/pariwisata/{pariwisata}', [PariwisataController::class, 'show'])->name('pariwisata.show');
    Route::get('/pariwisata/{pariwisata}/edit', [PariwisataController::class, 'edit'])->name('pariwisata.edit');
    Route::put('/pariwisata/{pariwisata}', [PariwisataController::class, 'update'])->name('pariwisata.update');
    Route::patch('/pariwisata/{pariwisata}', [PariwisataController::class, 'update']);
    Route::delete('/pariwisata/{pariwisata}', [PariwisataController::class, 'destroy'])->name('pariwisata.destroy');
});