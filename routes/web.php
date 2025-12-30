<?php
// routes/web.php

use App\Http\Controllers\CarListController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Landing page menampilkan daftar mobil
Route::get('/', [CarListController::class, 'index'])->name('home');

// HAPUS ATAU KOMENTARI BLOK INI KARENA TIDAK DIGUNAKAN
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

// Detail mobil dapat dilihat tanpa login
Route::get('/cars/{car}', [CarListController::class, 'show'])->name('cars.show');

// Route khusus admin (harus login dan role admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('cars', \App\Http\Controllers\Admin\CarController::class);
});

// Profile hanya untuk admin yang login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
