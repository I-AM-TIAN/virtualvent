<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formulario-registro', [AuthController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [AuthController::class, 'registerUser'])->name('register.user');

