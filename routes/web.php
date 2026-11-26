<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Peru Pima Editorial & Blog
|--------------------------------------------------------------------------
*/

// Editorial & Blog Routes
Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Authentication Routes (Guest Only)
Route::middleware('guest')->group(function (): void {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/registro', [RegisterController::class, 'register']);
});

// Authenticated Routes
Route::middleware('auth')->group(function (): void {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
