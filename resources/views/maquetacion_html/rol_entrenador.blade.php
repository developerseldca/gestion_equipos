<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Entrenador</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <header class="header">
        <h1>Bienvenido, Entrenador {{ $usuario->nombre }}</h1>
    </header>

    <main class="container">
        @if ($usuario->grupo_id)
            <p>Ya estás asociado al grupo: <strong>{{ $usuario->grupo->nombre ?? 'Sin nombre' }}</strong></p>
            <ul>
                <li><a href="#">Gestionar grupo de entrenamiento</a></li>
                <li><a href="#">Gestionar entrenamientos</a></li>
                <li><a href="#">Ver reportes de progreso</a></li>
            </ul>
        @else
            <p>No tienes un grupo de entrenamiento asociado.</p>

            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('grupos.store') }}" method="POST" class="form">
                @csrf
                <label for="nombre_grupo">Nombre del grupo:</label>
                <input type="text" id="nombre_grupo" name="nombre_grupo" required>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="3"></textarea>

                <button type="submit" class="btn">Crear grupo de entrenamiento</button>
            </form>
        @endif

        <p style="margin-top: 1rem;">
            <a href="{{ route('inicio') }}">Volver a la página principal</a>
        </p>
    </main>
</body>
</html>
