<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', function () {
    return view('maquetacion_html.registro');
});

Route::resource('usuarios', UsuarioController::class);