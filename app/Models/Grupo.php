<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = ['nombre', 'entrenador_id'];

    public function entrenador()
    {
        return $this->belongsTo(Usuario::class, 'entrenador_id');
    }

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'grupo_usuario');
    }
}
