<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        return Usuario::all();
    }

    // Crear nuevo usuario
    public function store(Request $request)
    {
        return Usuario::create($request->all());
    }

    // Mostrar un usuario específico
    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());
        return $usuario;
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        Usuario::destroy($id);
        return response()->json(['mensaje' => 'Usuario eliminado']);
    }
}
