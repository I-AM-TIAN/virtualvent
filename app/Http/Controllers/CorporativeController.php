<?php

namespace App\Http\Controllers;

use App\Models\Corporativo;
use App\Models\Departamento;
use App\Models\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;
use App\Models\Municipio;
use App\Models\User;
use App\Models\Usuario;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\select;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Str;

class CorporativeController extends Controller
{
    public function index()
    {
        $corporativos = DB::table('corporativos')
            ->join('users', 'corporativos.usuario', '=', 'users.id')
            ->join('direccions', 'corporativos.direccion', '=', 'direccions.id')
            ->select(
                'corporativos.*',
                'users.user_name as nombre_usuario',
                'direccions.detalle as direccion_detalle'
            )
            ->get();


        return view('auth.superuser.corporatives')->with('corporativos', $corporativos);
    }

    public function create(Request $request)
    {
        $nit = $request->nit;
        $razonsocial = $request->razonsocial;
        $password = Str::random(12);

        $empresa = Corporativo::find($nit);
        if (isEmpty($empresa)) {
            $user = User::create([
                'user_name' => $request->razonsocial,
                'password' => Hash::make($password),
                'tipo_usuario_id' => 2,
            ]);

            // Almacena el ID del usuario y la contraseña
            $userId = $user->id;
            $userPassword = $password;

            
            $codMun = $request->mun;
            $codDep = $request->dep;

            $municipio = Municipio::where('id', 1)->first();

            $departamento = Departamento::where('id', 1)->first();

            $direccion = Direccion::create([
                'detalle' => $request->direccion,
                'id_municipio' => $municipio->id,
                'id_departamento' => $departamento->id
            ]);

            $direccionId = $direccion->id;

            $empresa = Corporativo::create([
                "nit" => $request->nit,
                "razon_social" => $razonsocial,
                "direccion" => $direccionId,
                "usuario" => $userId,
                "email" => $request->email,
                "telefono" => $request->telefono,
            ]);

            // Envia la notificación y pasa el nombre de usuario y la contraseña
            $empresa->notify(new TestNotification($user->user_name, $userPassword));
        }
        return redirect('/corporativos');
    }

    public function busqueda(Request $request){
        $nit = $request->default;
        $razonsocial = $request->default;
        $corporativos = DB::select("SELECT * FROM corporativos WHERE nit LIKE '$nit' OR razon_social LIKE '$razonsocial'");

        return view('auth.superuser.corporatives')->with('corporativos', $corporativos);
    }
}
