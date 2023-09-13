<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\NikController;

// Mengatur rute beranda ke halaman login
Route::get('/', [UserController::class,'showLoginForm'])->name('login'); // Nama rute berubah menjadi 'login'

// Rute untuk halaman dashboard yang memerlukan autentikasi
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('pages.dashboard.index');

// Rute untuk mengelola data
Route::resource('/data', DataController::class);
Route::get('/data/search', [DataController::class, 'search'])->name('data.search');

// Rute untuk mengelola NIK
Route::resource('/nik', NikController::class);
Route::get('/nik/{nik}', [NikController::class, 'show'])->name('nik.show');
Route::get('/nik/search', [NikController::class, 'search'])->name('nik.search');
Route::get('/export-nik', [NikController::class, 'export'])->name('nik.export');

// Rute untuk login dan logout
Route::post('/login', [UserController::class, 'login'])->name('login.post'); // Nama rute POST diubah menjadi 'login.post'
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// ...

// Rute lainnya sesuai dengan kebutuhan aplikasi Anda
