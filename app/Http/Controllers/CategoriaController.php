<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = DB::select("SELECT * FROM categorias");

        return view("auth.corporative.categorias")->with("categorias" , $categorias);
    }

    public function create(Request $request){
        Categoria::create([
            "nombre" => $request->categoria
        ]);

        return redirect("/categorias");
    }
}
