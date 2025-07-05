<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Grupo Creado</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <header class="header">
        <h1>¡Grupo creado exitosamente!</h1>
    </header>

    <main class="container">
        <p>Tu grupo ha sido registrado correctamente.</p>

        <form action="{{ route('rol.entrenador') }}" method="GET">
            <button type="submit" class="btn">Continuar</button>
        </form>
    </main>
</body>
</html>
