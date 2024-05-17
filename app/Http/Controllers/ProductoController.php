<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index(){
        //obtener todos los productos de la base de datos
        $productos =  DB::select("SELECT * FROM Productos");

        return view("auth.corporative.productos")->with('productos',$productos);

        //
    }
}
