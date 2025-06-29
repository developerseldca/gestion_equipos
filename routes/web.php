<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;

/* ------------- NUEVA PORTADA ------------- */
Route::get('/', function () {
    return view('maquetacion_html.index');
})->name('inicio');

/* ------------- REGISTRO ------------- */
Route::get('/registro', [UsuarioController::class, 'create'])->name('registro');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

/* ------------- LOGIN ------------- */
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');

/* ------------- RUTAS PROTEGIDAS (requieren login) ------------- */
Route::middleware('auth')->group(function () {

    // Página de dashboard
    Route::view('/dashboard', 'maquetacion_html.dashboard')->name('dashboard');

    // Entrenador
    Route::get('/rol-entrenador', [UsuarioController::class, 'rolEntrenador'])->name('rol.entrenador');

    // Deportista
    Route::get('/rol-deportista', [UsuarioController::class, 'rolDeportista'])->name('rol.deportista');

    // Crear grupo de entrenamiento
    Route::post('/grupos', [UsuarioController::class, 'storeGrupo'])->name('grupos.store');
});

/* ------------- CERRAR SESIÓN ------------- */
Route::post('/logout', function () {
    Auth::logout(); // Cierra la sesión
    return redirect()->route('inicio'); // Redirige a la página principal
})->name('logout');
