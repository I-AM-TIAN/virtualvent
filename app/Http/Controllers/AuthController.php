<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        Usuario::create([
            'user_name' => $request->username,
            'password' => Hash::make($request->password),
            'tipo_usuario_id' => 1,
        ]);

        $credentials = $request->only('user_name', 'password');
        Auth::attempt($credentials);

        $request->session()->regenerate();

        return view('auth.index');
    }

    public function logeado()
    {
        // Comprobamos si el usuario ya está logado
        if (Auth::check()) {

            // Si está logado le mostramos la vista de logados
            return view('auth.logeado');
        }

        // Si no está logado le mostramos la vista con el formulario de login
        return view('auth.index');
    }

    public function login(Request $request)
    {
        // Comprobamos que el email y la contraseña han sido introducidos
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Almacenamos las credenciales de email y contraseña
        $credentials = $request->only('user_name', 'password');

        // Si el usuario existe lo logamos y lo llevamos a la vista de "logados" con un mensaje
        if (Auth::attempt($credentials)) {
            return redirect()->intended('auth.logeado')
                ->withSuccess('Logado Correctamente');
        }

        // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
        return redirect("/logeado")->withSuccess('Los datos introducidos no son correctos');
    }

    /**
     * Función que muestra la vista de logados si el usuario está logado y si no le devuelve al formulario de login
     * con un mensaje de error
     */
    public function logados()
    {
        if (Auth::check()) {
            return view('auth.logeado');
        }

        return redirect("/logeado")->withSuccess('No tienes acceso, por favor inicia sesión');
    }
}
