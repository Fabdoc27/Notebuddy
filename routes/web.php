<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::view( "/", "pages.dashboard" )->name( 'dashboard' );

Route::get( "/registration", [RegistrationController::class, "index"] )->name( 'register' );
Route::post( "/registration", [RegistrationController::class, "store"] );

Route::get( "/login", [LoginController::class, "index"] )->name( 'login' );
Route::post( "/login", [LoginController::class, "userLogin"] );

Route::post( '/logout', LogoutController::class )->name( 'logout' );