<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Gestión de Equipos Deportivos</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <header class="header">
        <h1>Registrar Usuario</h1>
    </header>
    <main>
       <form action="{{ url('/usuarios') }}" method="POST" id="registroForm">
    @csrf

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="identificacion">Identificación:</label>
    <input type="text" id="identificacion" name="identificacion" required>

    <label for="correo">Correo:</label>
    <input type="email" id="correo" name="correo" required>

    <label for="contraseña">Contraseña:</label>
    <input type="password" id="contraseña" name="contraseña" required>

    <button type="submit" class="btn">Registrar</button>
</form>

    </main>
</body>
</html>
