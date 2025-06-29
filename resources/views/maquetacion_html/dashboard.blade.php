<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <header class="header">
        <h1>¡Bienvenido, {{ auth()->user()->nombre }}!</h1>
    </header>

    <main class="container">
        <p>Selecciona tu rol para continuar:</p>

        <div style="display: flex; gap: 1rem;">
            <a href="{{ route('rol.entrenador') }}" class="btn">Entrenador</a>
            <a href="{{ route('rol.deportista') }}" class="btn">Deportista</a>
        </div>

        <p style="margin-top: 2rem;">
            <a href="{{ route('inicio') }}">Volver a la página principal</a>
        </p>
    </main>
</body>
</html>
