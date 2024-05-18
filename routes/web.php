<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CorporativeController;
use App\Http\Controllers\SuperUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/formulario-registro', [AuthController::class, 'showRegisterForm'])->name('register');

Route::post('/register', [AuthController::class, 'registerUser'])->name('register.user');

Route::get('/login', [AuthController::class, 'index']);

Route::post('/logear', [AuthController::class, 'login'])->name('logear.user');

Route::get('/logeados', [AuthController::class, 'logados']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/admin', [AuthController::class, 'admin']);

Route::get('/corporative', [AuthController::class, 'corporative']);

Route::get('/users', [SuperUserController::class, 'index']);

Route::get('/corporativos', [CorporativeController::class, 'index']);

Route::post('/registrarcorporativo', [CorporativeController::class, 'create'])->name('register.corporative');

Route::get('/registrarse', [ClientController::class, 'MostrarFormulario']);

Route::post('/registrarcliente', [ClientController::class, 'registerClient'])->name('register.client');

Route::get('/admini', [ProductoController::class, 'admini']);

Route::get('/productos', [ProductoController::class, 'index']);
