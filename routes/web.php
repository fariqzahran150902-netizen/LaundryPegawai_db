<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');

    Route::middleware(['role:admin'])->group(function () {
        Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
        Route::delete('/pelanggan-delete-all', [PelangganController::class, 'deleteAll'])->name('pelanggan.deleteAll');
    });
});