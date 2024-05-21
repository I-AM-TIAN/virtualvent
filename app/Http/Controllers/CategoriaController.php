<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = DB::select("SELECT * FROM categorias");

        return view("auth.corporative.categorias")->with("categorias" , $categorias);
    }
}
