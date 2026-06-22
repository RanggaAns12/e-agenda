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

    // Fitur Ekspor & Cetak
    Route::get('klasifikasi/export/excel', [KlasifikasiSuratController::class, 'exportExcel'])->name('klasifikasi.export.excel');
    Route::get('klasifikasi/export/pdf', [KlasifikasiSuratController::class, 'exportPdf'])->name('klasifikasi.export.pdf');

    Route::get('surat-masuk/export/excel', [SuratMasukController::class, 'exportExcel'])->name('surat-masuk.export.excel');
    Route::get('surat-masuk/export/pdf', [SuratMasukController::class, 'exportPdf'])->name('surat-masuk.export.pdf');
    Route::get('surat-masuk/{id}/print', [SuratMasukController::class, 'printSingle'])->name('surat-masuk.print');

    Route::get('surat-keluar/export/excel', [SuratKeluarController::class, 'exportExcel'])->name('surat-keluar.export.excel');
    Route::get('surat-keluar/export/pdf', [SuratKeluarController::class, 'exportPdf'])->name('surat-keluar.export.pdf');
    Route::get('surat-keluar/{id}/print', [SuratKeluarController::class, 'printSingle'])->name('surat-keluar.print');

    Route::get('disposisi/export/excel', [DisposisiController::class, 'exportExcel'])->name('disposisi.export.excel');
    Route::get('disposisi/export/pdf', [DisposisiController::class, 'exportPdf'])->name('disposisi.export.pdf');
    Route::get('disposisi/{id}/print', [DisposisiController::class, 'printSingle'])->name('disposisi.print');

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