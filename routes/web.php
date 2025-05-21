<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', [PenilaianController::class, 'dashboard'])->name('dashboard.index');

    // Kriteria (Criteria)
    Route::resource('criteria', CriteriaController::class);

    // Siswa (Students)
    Route::resource('students', StudentController::class);

    // Penilaian
    Route::get('penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::get('penilaian/input', [PenilaianController::class, 'input'])->name('penilaian.input');
    Route::post('penilaian/simpan', [PenilaianController::class, 'simpan'])->name('penilaian.simpan');
});

// Register
Route::get('/register', [RegisterController::class, 'showForm'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');

// Login
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::post('/login-proses', [AuthController::class, 'login'])->name('loginproccess');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
