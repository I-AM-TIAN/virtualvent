<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ClientController extends Controller
{
  public function MostrarFormulario()
  {
    return view('register');
  }

  public function registerClient(Request $request)
  {
    $existingClient = Cliente::where('email', $request->email)
      ->orWhere('telefono', $request->telefono)
      ->orWhere('identificacion', $request->documento)
      ->first();

    if (isEmpty($existingClient)) {
      $usuario = User::create([
        'user_name' => $request->username,
        'password' => $request->password,
        'tipo_usuario_id' => 3
      ]);

      $IdUsuario = $usuario->id;

      Cliente::create([
        'nombre' => $request->name,
        'apellido' => $request->lastname,
        'identificacion' => $request->documento,
        'sexo' => $request->select_div,
        'fecha_nacimiento' => $request->fechanac,
        'tipo_documento' => $request->select_doc,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'id_usuario' => $IdUsuario,
      ]);
    }

    return redirect('/');
  }

  public function index()
  { 
    $user= auth()->user();
    $cliente = Cliente::where('id_usuario', $user->id)->get();
    
    return view('auth.cliente.index')->with("cliente", $cliente);
  }

}
