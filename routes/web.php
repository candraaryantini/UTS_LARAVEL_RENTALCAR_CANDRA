<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Semua route utama aplikasi rental mobil didefinisikan di sini.
| Pastikan semua controller sudah dibuat di:
| app/Http/Controllers/
|
*/

// 🔹 Redirect halaman utama ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// ======================
// 🔹 DASHBOARD
// ======================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// ======================
// 🔹 CRUD MOBIL (Car)
// ======================
Route::prefix('cars')->name('cars.')->group(function () {
    Route::get('/', [CarController::class, 'index'])->name('index');
    Route::get('/create', [CarController::class, 'create'])->name('create');
    Route::post('/', [CarController::class, 'store'])->name('store');
    Route::get('/{car}', [CarController::class, 'show'])->name('show');
    Route::get('/{car}/edit', [CarController::class, 'edit'])->name('edit');
    Route::put('/{car}', [CarController::class, 'update'])->name('update');
    Route::delete('/{car}', [CarController::class, 'destroy'])->name('destroy');
});

// ======================
// 🔹 CRUD CUSTOMER
// ======================
Route::prefix('customers')->name('customers.')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('index');
    Route::get('/create', [CustomerController::class, 'create'])->name('create');
    Route::post('/', [CustomerController::class, 'store'])->name('store');
    Route::get('/{customer}', [CustomerController::class, 'show'])->name('show');
    Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('edit');
    Route::put('/{customer}', [CustomerController::class, 'update'])->name('update');
    Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('destroy');
});

// ======================
// 🔹 CRUD RENTAL
// ======================
Route::prefix('rentals')->name('rentals.')->group(function () {
    Route::get('/', [RentalController::class, 'index'])->name('index');
    Route::get('/create', [RentalController::class, 'create'])->name('create');
    Route::post('/', [RentalController::class, 'store'])->name('store');
    Route::get('/{rental}', [RentalController::class, 'show'])->name('show');
    Route::get('/{rental}/edit', [RentalController::class, 'edit'])->name('edit');
    Route::put('/{rental}', [RentalController::class, 'update'])->name('update');
    Route::delete('/{rental}', [RentalController::class, 'destroy'])->name('destroy');
});
