<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ClientController extends Controller
{
    public function MostrarFormulario(){
		return view('register');
    }

    public function registerClient(Request $request)
	{
    $email = $request->email;
    $telefono = $request->telefono;
    $documento = $request->documento;
    $usuario = $request->usuario;
    $cliente = DB::select("SELECT * FROM `clientes` WHERE documento = '$documento' or email = '$email'");
	}
  
}
