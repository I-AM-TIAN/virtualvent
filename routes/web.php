<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CorporativeController;
use App\Http\Controllers\SuperUserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClienteController;
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

Route::get('/users', [AuthController::class, 'list']);

Route::get('/corporativos', [CorporativeController::class, 'index']);

Route::post('/buscarcorporativo', [CorporativeController::class, 'busqueda'])->name('find.corporative');

Route::post('/registrarcorporativo', [CorporativeController::class, 'create'])->name('register.corporative');

Route::get('/registrarse', [ClientController::class, 'MostrarFormulario']);

Route::post('/registrarcliente', [ClientController::class, 'registerClient'])->name('register.client');

Route::get('/admini', [ProductoController::class, 'admini']);

Route::get('/productos', [ProductoController::class, 'index']);

Route::get('/categorias', [CategoriaController::class, 'index']);

Route::post('/registrarcategoria', [CategoriaController::class, 'create'])->name('register.category');

Route::post('/registrarproducto', [ProductoController::class, 'create'])->name('register.producto');

Route::post('/buscarproducto', [ProductoController::class, 'busqueda'])->name('find.producto');

Route::get("/eliminar-producto-{id}",[ProductoController::class,"delete"])->name("producto.delete");

Route::put("/modificar-producto/{id}",[ProductoController::class,"update"])->name("producto.update");

Route::get('/cliente', [ClientController::class, 'index']);

Route::put('/modificarcorporativo/{id}', [CorporativeController::class, 'update'])->name('update.corporative');

Route::put('/modificarcliente/{id}', [ClientController::class, 'update'])->name('update.cliente');