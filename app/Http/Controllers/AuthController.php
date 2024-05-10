<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        User::create([
            'user_name' => $request->username,
            'password' => Hash::make($request->password),
            'tipo_usuario_id' => 1,
        ]);

        $credentials = $request->only('user_name', 'password');
        Auth::attempt($credentials);

        $request->session()->regenerate();

        return view('auth.index');
    }

    public function index()
	{
	    // Comprobamos si el usuario ya está logado
	    if (Auth::check()) {
	
	        // Si está logado le mostramos la vista de logados
	        return view('auth.logeado');
	    }
	
	    // Si no está logado le mostramos la vista con el formulario de login
	    return view('auth.index');
	}

	public function login(Request $request){
	    // Comprobamos que el email y la contraseña han sido introducidos
	    $request->validate([
	        'user_name' => 'required',
	        'password' => 'required',
	    ]);
	
	    // Almacenamos las credenciales de email y contraseña
	    $credentials = $request->only('user_name', 'password', 'tipo_usuario_id');
	
	    // Si el usuario existe lo logamos y lo llevamos a la vista de "logados" con un mensaje
	    if (Auth::attempt($credentials)) {
	        return view('auth.logeado');
	    }
	
	    // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
	    return redirect("/login")->withSuccess('Los datos introducidos no son correctos');
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
	
	    return redirect("/login")->withSuccess('No tienes acceso, por favor inicia sesión');
    }

	public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('welcome');
    }
}
