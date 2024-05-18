<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
  public function index()
  {
    // Obtener todos los productos de la base de datos
    $productos = DB::select("SELECT * FROM Productos");
    // Obtener todas las categorias
    $categorias = DB::select("SELECT * FROM Categorias");

    // Retornar la vista con ambas variables
    return view("auth.corporative.productos")->with([
      'productos' => $productos,
      'categorias' => $categorias
    ]);
  }


  public function admini()
  {
    if (Auth::check()) {
      return view('auth.corporative.index');
    }

    return redirect('/login');
  }
}
