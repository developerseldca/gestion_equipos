<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
=======

use App\Http\Controllers\UsuarioController;

Route::resource('usuarios', UsuarioController::class);
>>>>>>> 5efc216 (Reconexión al repositorio y reenvío de archivos)
