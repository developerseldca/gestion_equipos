<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Muestra todos los usuarios (opcional).
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    /**
     * Muestra el formulario de registro.
     */
    public function create()
    {
        return view('maquetacion_html.registro');
    }

    /**
     * Guarda un nuevo usuario en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'identificacion' => 'required|string|max:20|unique:usuarios',
            'correo' => 'required|email|unique:usuarios,email',
            'contraseña' => 'required|string|min:6',
        ]);

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->identificacion = $request->identificacion;
        $usuario->email = $request->correo;
        $usuario->password = bcrypt($request->contraseña);
        $usuario->save();

        return view('maquetacion_html.registro_exitoso');
    }
}
