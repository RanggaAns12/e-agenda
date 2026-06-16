<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\KlasifikasiSuratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// 1. Halaman Awal langsung diarahkan ke Login
Route::get('/', function () {
    return redirect()->route('login');
});

// 2. Rute yang HANYA bisa diakses jika user sudah Login (Auth)
Route::middleware('auth')->group(function () {
    
    // Halaman Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Fitur Utama E-Agenda (Bisa diakses Admin & Petugas)
    Route::resource('klasifikasi', KlasifikasiSuratController::class);
    Route::resource('surat-masuk', SuratMasukController::class);
    Route::resource('surat-keluar', SuratKeluarController::class);
    Route::resource('disposisi', DisposisiController::class);

    // Fitur Edit Profil (Bawaan Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. Rute KHUSUS ADMIN (Menggunakan Middleware 'role:admin' yang kita buat)
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Manajemen User hanya untuk Admin
    Route::resource('users', UserController::class);
});

// Memanggil rute login/logout dari file auth.php
require __DIR__.'/auth.php';