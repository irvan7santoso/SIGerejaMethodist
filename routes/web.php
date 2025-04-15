<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\GerejaController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/jadwal', [GerejaController::class, 'jadwal'])->name('jadwal.index');
    Route::post('/gereja/jadwal', [GerejaController::class, 'simpanJadwal'])->name('gereja.jadwal.simpan');
    Route::post('/gereja/informasi', [GerejaController::class, 'simpanInformasi'])->name('gereja.informasi.simpan');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
