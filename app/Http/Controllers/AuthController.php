<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function showLogin()
    {
        return view('maquetacion_html.login');
    }

    // Procesar el inicio de sesión
    public function processLogin(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Buscar usuario por email
    $usuario = Usuario::where('email', $request->email)->first();

    if ($usuario && Hash::check($request->password, $usuario->password)) {
        // Inicia sesión
        Auth::login($usuario);
        return redirect()->route('dashboard');
    } else {
        // Credenciales incorrectas
        return back()->withErrors(['credenciales' => 'Correo o contraseña incorrectos.'])->withInput();
    }
}
}
