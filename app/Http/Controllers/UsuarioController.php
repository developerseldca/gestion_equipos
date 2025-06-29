<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    // Muestra todos los usuarios (opcional)
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    // Muestra el formulario de registro
    public function create()
    {
        return view('maquetacion_html.registro');
    }

    // Guarda un nuevo usuario en la base de datos
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

    // ✅ AQUÍ van las funciones adicionales

    // Vista del rol Entrenador
    public function rolEntrenador()
    {
        $usuario = auth()->user();
        return view('maquetacion_html.rol_entrenador', compact('usuario'));
    }

    // Vista del rol Deportista
    public function rolDeportista()
    {
        $usuario = auth()->user();
        return view('maquetacion_html.rol_deportista', compact('usuario'));
    }
    // Método para almacenar un grupo nuevo
public function storeGrupo(Request $request)
{
    $request->validate([
        'nombre_grupo' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
    ]);

    // Crear grupo y asociar al entrenador actual
    $grupo = new \App\Models\Grupo();
    $grupo->nombre_grupo = $request->nombre_grupo;
    $grupo->descripcion = $request->descripcion;
    $grupo->entrenador_id = auth()->id(); // ID del usuario autenticado
    $grupo->save();

    return redirect()->route('rol.entrenador')->with('success', 'Grupo creado exitosamente');
}

}
