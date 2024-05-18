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
    $productos =DB::table('productos')
    ->join('categorias', 'productos.id_categoria', '=', 'categorias.id')
    ->select(
        'productos.*',
        'categorias.nombre as nombre_categoria',
    )
    ->get();
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

  public function busqueda(Request $request){
    $nombre = $request->default;
    $categoria = $request->default;

    // Utiliza parámetros enlazados para evitar inyecciones SQL
    $productos = DB::select("
        SELECT 
            productos.*, 
            categorias.nombre AS nombre_categoria
        FROM productos
        INNER JOIN categorias ON productos.id_categoria = categorias.id
        WHERE productos.nombre LIKE ? OR categorias.nombre LIKE ?
    ", ["%$nombre%", "%$categoria%"]);

    $categorias = DB::select("SELECT * FROM Categorias");

    return view('auth.corporative.productos')->with([
      'productos' => $productos,
      'categorias' => $categorias
    ]);
}

}
