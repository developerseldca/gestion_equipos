<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'identificacion',
        'email',
        'password',
    ];

    // Relación: un usuario puede tener un grupo si es entrenador
    public function gruposComoEntrenador()
    {
        return $this->hasMany(Grupo::class, 'entrenador_id');
    }

    // Relación: un usuario puede pertenecer a muchos grupos como deportista
    public function gruposComoDeportista()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_usuario', 'usuario_id', 'grupo_id');
    }
}
