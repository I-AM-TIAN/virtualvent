<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formulario-registro', [AuthController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [AuthController::class, 'registerUser'])->name('register.user');

Route::get('/login', [AuthController::class, 'index']);

Route::post('/logear', [AuthController::class, 'login'])->name('logear.user');

Route::get('/logados', [AuthController::class, 'logados']);