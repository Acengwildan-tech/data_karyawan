<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Tambahkan ini
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

    Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Admin Only Routes
    Route::middleware('role:admin')->group(function () {
        Route::resource('jabatan', JabatanController::class);
        Route::get('karyawan/export/pdf', [KaryawanController::class, 'exportPdf'])->name('karyawan.export.pdf');
        Route::get('karyawan/export/excel', [KaryawanController::class, 'exportExcel'])->name('karyawan.export.excel');
        Route::resource('karyawan', KaryawanController::class)->except(['index']);
    });
    
    // Karyawan & Admin Shared Routes
    Route::resource('karyawan', KaryawanController::class)->only(['index']);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
