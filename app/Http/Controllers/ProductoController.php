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

        return view("auth.corporative.productos")->with('productos',$productos);

        //
    }

    public function admini(){
		if (Auth::check()) {
			return view('auth.corporative.index');
		}

		return redirect('/login');
    }
}
