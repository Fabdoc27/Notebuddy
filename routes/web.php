<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/sign-up', [RegisterController::class, 'create'])->name('register');
Route::post('/sign-up', [RegisterController::class, 'store']);
Route::get('/sign-in', [AuthController::class, 'create'])->name('login');
Route::post('/sign-in', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::view('/', 'pages.dashboard')->name('dashboard');
    Route::resource('profiles', ProfileController::class)->only('edit', 'update');
    Route::resource('notes', NoteController::class);
});
