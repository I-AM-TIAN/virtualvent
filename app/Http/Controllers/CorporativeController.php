<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class CorporativeController extends Controller
{
    public function index(){
        $corporativos = DB::select("SELECT * FROM corporativos");

        return view("auth.SuperUser.corporatives")->with("corporativos", $corporativos);
    }
}
