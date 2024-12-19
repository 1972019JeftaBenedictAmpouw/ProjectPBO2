<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware(['auth', 'checkRole:admin'])->group(function () {
        Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('/register', [RegisteredUserController::class, 'store']);
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('editData');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('update');
        Route::get('/dataSiswa', [UserController::class, 'dataSiswa'])->name('dataSiswa');
        Route::get('/dataGuru', [UserController::class, 'dataGuru'])->name('dataGuru');
        Route::get('/add-jadwal', [JadwalController::class, 'create'])->name('addJadwalForm');
        Route::post('/add-jadwal', [JadwalController::class, 'store'])->name('addJadwal');
        
    });

    Route::middleware(['auth', 'checkRole:guru'])->group(function () {
        Route::get('/add-nilai', [NilaiController::class, 'create'])->name('addNilaiForm');
        Route::post('/add-nilai', [NilaiController::class, 'store'])->name('addNilai');
    });  
    
    Route::get('/jadwal', [JadwalController::class, 'indexForSiswa'])->name('indexJadwal');
    Route::get('/nilai', [NilaiController::class, 'indexForSiswa'])->name('indexNilai');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
