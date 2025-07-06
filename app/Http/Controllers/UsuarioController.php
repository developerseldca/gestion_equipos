<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Grupo;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    // Mostrar formulario de registro
    public function create()
    {
        return view('maquetacion_html.registro'); // Asegúrate de tener esta vista
    }

    // Mostrar panel del entrenador
    public function rolEntrenador()
    {
        $usuario = Auth::user();
        $usuario->load('gruposComoEntrenador');

        $grupo = $usuario->gruposComoEntrenador->first();

        return view('maquetacion_html.rol_entrenador', compact('usuario', 'grupo'));
    }

    // Crear grupo
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

        return view('maquetacion_html.grupo_creado');
    }

    // Mostrar detalles del grupo
    public function detallesGrupo()
    {
        $usuario = auth()->user();
        $grupo = $usuario->gruposComoEntrenador()->withCount('usuarios')->first();

        if (!$grupo) {
            return redirect()->route('rol.entrenador')->with('error', 'No tienes un grupo asociado.');
        }

        // Obtener usuarios disponibles (que no estén en el grupo y no sean el entrenador)
        $usuariosDisponibles = Usuario::where('id', '!=', $usuario->id)
            ->whereDoesntHave('gruposComoDeportista', function ($query) use ($grupo) {
                $query->where('grupo_id', $grupo->id);
            })->get();

        return view('maquetacion_html.gestionar_grupo', compact('usuario', 'grupo', 'usuariosDisponibles'));
    }

    // Actualizar grupo
    public function actualizarGrupo(Request $request)
    {
        $usuario = auth()->user();
        $grupo = $usuario->gruposComoEntrenador()->first();

        if (!$grupo) {
            return redirect()->route('rol.entrenador')->with('error', 'No se encontró el grupo para actualizar.');
        }

        $grupo->nombre_grupo = $request->nombre_grupo;
        $grupo->descripcion = $request->descripcion;
        $grupo->save();

        return redirect()->route('grupos.gestionar')->with('success', 'Grupo actualizado correctamente.');
    }

    // Eliminar grupo
    public function eliminarGrupo()
    {
        $usuario = auth()->user();
        $grupo = $usuario->gruposComoEntrenador()->first();

        if (!$grupo) {
            return redirect()->route('rol.entrenador')->with('error', 'No se encontró el grupo para eliminar.');
        }

        $grupo->delete();

        return redirect()->route('rol.entrenador')->with('success', 'Grupo eliminado correctamente.');
    }

    // Eliminar deportista del grupo
    public function eliminarDeportista($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->gruposComoDeportista()->detach();

        return back()->with('success', 'Deportista eliminado del grupo.');
    }

    // Agregar nuevos integrantes al grupo
    public function agregarIntegrantes(Request $request)
    {
        $usuario = Auth::user();
        $grupo = $usuario->gruposComoEntrenador()->first();

        if (!$grupo) {
            return back()->with('error', 'No tienes grupo asociado.');
        }

        $grupo->usuarios()->attach($request->input('usuarios', []));

        return redirect()->route('grupos.gestionar')->with('success', 'Integrantes agregados correctamente.');
    }
}
