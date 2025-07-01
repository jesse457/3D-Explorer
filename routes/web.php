<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/login',[\App\Http\Controllers\AuthController::class, 'login'])
    ->name('login');
Route::post('/login/index', [\App\Http\Controllers\AuthController::class, 'loginIndex'])
    ->name('login.save');
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])
    ->name('register');
Route::post('/register/index', [\App\Http\Controllers\AuthController::class, 'registerIndex'])
    ->name('register.save');
Route::get('/dashboard', [\App\Http\Controllers\Dashboard::class, 'index'])
    ->name('dashboard');
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout');