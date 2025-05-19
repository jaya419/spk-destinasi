<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecomendasiController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;


Route::middleware('auth')->group(function () {
    Route::get('/', [RecomendasiController::class, 'dashboard'])->name('dashboard.index');
Route::resource('criteria', CriteriaController::class);
Route::resource('destinations', DestinationController::class);
Route::get('recomendasi', [RecomendasiController::class, 'index'])->name('recomendasi.index');
Route::get('recomendasi/input', [RecomendasiController::class, 'input'])->name('recomendasi.input');
Route::post('recomendasi/simpan', [RecomendasiController::class, 'simpan'])->name('recomendasi.simpan');
Route::get('/destination', [DestinationController::class, 'index'])->name('destination.index');
});

Route::get('/register', [RegisterController::class, 'showForm'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::post('/login-proses', [AuthController::class, 'login'])->name('loginproccess');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');