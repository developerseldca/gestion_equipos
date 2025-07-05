<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Grupo;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    // Método para mostrar el panel del entrenador
    public function rolEntrenador()
    {
        $usuario = Auth::user();
        $usuario->load('gruposComoEntrenador');

        // Obtenemos el primer grupo que tenga como entrenador
        $grupo = $usuario->gruposComoEntrenador->first();

        return view('maquetacion_html.rol_entrenador', compact('usuario', 'grupo'));
    }


    // Método para crear grupo
    public function storeGrupo(Request $request)
    {
        $request->validate([
            'nombre_grupo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
        ]);

        $usuario = Auth::user();

        $grupo = new Grupo();
        $grupo->nombre_grupo = $request->nombre_grupo;
        $grupo->descripcion = $request->descripcion;
        $grupo->entrenador_id = $usuario->id;
        $grupo->save();

        // Asociar el grupo al usuario
        $usuario->save();

        return view('maquetacion_html.grupo_creado');
    }

    // Otros métodos como create, store (registro), etc.
}
