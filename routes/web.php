<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'welcome'])->name('welcome');
Route::get('/administrator', [UserController::class,'loginForm'])->name('login');
Route::post('/login', [UserController::class,'login']);
Route::post('/logout', [UserController::class,'logout'])->name('logout');
Route::get('/privacy', [WelcomeController::class,'privacy'])->name('privacy');
Route::get('/request-deletion', [WelcomeController::class,'requestDeletion'])->name('request-deletion');
Route::post('/request-deletion-action', [WelcomeController::class,'requestDeletionAction'])->name('account.deletion.submit');

Route::get('/app/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware(['auth'])->prefix('app')->group(function () {
    foreach (glob(__DIR__.'/modules/*.php') as $routeFile) {
        require $routeFile;
    }
});