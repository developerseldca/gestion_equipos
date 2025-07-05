<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'identificacion',
        'email',
        'password',
    ];

    // Relación: Un entrenador puede tener muchos grupos
    public function gruposComoEntrenador()
    {
        return $this->hasMany(Grupo::class, 'entrenador_id');
    }

    // Relación: Un usuario puede pertenecer a muchos grupos como deportista
    public function gruposComoDeportista()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_usuario', 'usuario_id', 'grupo_id');
    }
}
