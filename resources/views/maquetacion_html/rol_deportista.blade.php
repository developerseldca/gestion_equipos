<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Deportista</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <header class="header">
        <h1>Bienvenido, Deportista {{ $usuario->nombre }}</h1>
    </header>

    <main class="container">
        @if ($usuario->grupo_id)
            <p>Perteneces al grupo: <strong>{{ $usuario->grupo->nombre ?? 'Sin nombre' }}</strong></p>
            <ul>
                <li><a href="#">Ver entrenamientos asignados</a></li>
                <li><a href="#">Ver avances y rendimiento</a></li>
            </ul>
        @else
            <p>No estás asociado a ningún grupo de entrenamiento.</p>
            <p>Espera a que un entrenador te registre en su grupo.</p>
        @endif

        <p style="margin-top: 1rem;">
            <a href="{{ route('inicio') }}">Volver a la página principal</a>
        </p>
    </main>
</body>
</html>
