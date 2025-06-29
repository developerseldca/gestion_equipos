<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Grupo de Entrenamiento</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <header class="header">
        <h1>Crear Grupo de Entrenamiento</h1>
    </header>

    <main class="container">
        <form action="{{ route('grupos.store') }}" method="POST" class="form">
            @csrf

            <label for="nombre">Nombre del Grupo:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="3" required></textarea>

            <button type="submit" class="btn">Crear Grupo</button>
        </form>

        <p style="margin-top: 1rem;">
            <a href="{{ route('inicio') }}">Volver a inicio</a>
        </p>
    </main>
</body>
</html>
