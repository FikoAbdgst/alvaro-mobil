<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CarListController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Landing page menampilkan daftar mobil
Route::get('/', [CarListController::class, 'index'])->name('home');

// Detail mobil dapat dilihat tanpa login
Route::get('/cars/{car}', [CarListController::class, 'show'])->name('cars.show');

// Route khusus admin (harus login dan role admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route untuk menandai mobil sebagai terjual dari dashboard
    Route::patch('/cars/{car}/mark-sold', [DashboardController::class, 'markAsSold'])->name('cars.mark-sold');

    Route::resource('cars', CarController::class);
    Route::resource('users', UserController::class)->except(['show']);

    Route::delete('/cars/images/{carImage}', [CarController::class, 'destroyImage'])->name('cars.images.destroy');
});

// Profile hanya untuk admin yang login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
