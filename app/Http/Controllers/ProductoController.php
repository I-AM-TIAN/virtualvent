<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    public function index(){
        //obtener todos los productos de la base de datos
        $productos =  DB::select("SELECT * FROM Productos");
        //obtener todos las categorias
        $categorias =  DB::select("SELECT * FROM Categorias");
        return view("auth.corporative.productos")->with('productos',$productos);
        return view("auth.corporative.productos")->with('categorias',$categorias);
        
    }

    public function admini(){
		if (Auth::check()) {
			return view('auth.corporative.index');
		}

		return redirect('/login');
    }
}
