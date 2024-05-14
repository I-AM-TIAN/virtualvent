<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SuperUserController extends Controller
{
    public function index()
    {   
        $users = DB::select("SELECT * FROM `users` WHERE tipo_usuario_id = 1");

        return view("auth.SuperUser.users")->with("users", $users);
    }

    public function create(Request $request){
        
    }
}
