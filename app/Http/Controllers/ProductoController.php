<?php

namespace App\Http\Controllers;

use App\Models\Corporativo;
use App\Models\Producto;
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
  //funcion registrar producto
  public function create(Request $request)
  {
    $user = auth()->user();

    $corporativo = Corporativo::where('usuario', $user->id)->first();
      Producto::create([
        "nombre" => $request->nombre,
        "descripcion" => $request->descripcion,
        "disponibilidad" => $request->disponibilidad,
        "precio" => $request->precio,
        "pedido_minimo" => $request->pedido_minimo,
        "fecha_entrega" => $request->fecha_entrega,
        "id_categoria" => $request->id_categoria,
        "id_corporativo" => $corporativo->id,
      ]); 
    return redirect('/productos');
  }

  public function admini()
  {
    if (Auth::check()) {
      return view('auth.corporative.index');
    }

    return redirect('/login');
  }
}
