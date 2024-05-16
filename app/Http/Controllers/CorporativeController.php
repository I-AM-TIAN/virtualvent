<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Usuario;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\select;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Str;

class CorporativeController extends Controller
{
    public function index(){
        $corporativos = DB::table('empresas')
        ->join('users', 'empresas.usuarios_id', '=', 'users.id')
        ->select('empresas.*', 'users.user_name as nombre_usuario')
        ->get();

    return view('auth.superuser.corporatives')->with('corporativos',$corporativos);
    }

    public function create(Request $request){
        $nit = $request->nit;
        $razonsocial = $request->razonsocial;
        $password = Str::random(12);
    
        $empresa = Empresa::find($nit);
        if(isEmpty($empresa)){
             $user = User::create([
                'user_name' => $request->razonsocial,
                'password' => Hash::make($password),
                'tipo_usuario_id' => 2,
            ]);
    
            // Almacena el ID del usuario y la contraseña
            $userId = $user->id;
            $userPassword = $password;
    
            $empresa = Empresa::create([
                "nit" => $request->nit,
                "usuarios_id" => $userId,
                "razon_social" => $razonsocial,
                "email" => $request->email,
                "telefono" => $request->telefono,
            ]);
    
            // Envia la notificación y pasa el nombre de usuario y la contraseña
            $empresa->notify(new TestNotification($user->user_name, $userPassword));
        }
        return redirect('/corporativos');
    }
    
}
