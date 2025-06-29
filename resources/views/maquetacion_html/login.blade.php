<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <header class="header">
        <h1>Iniciar Sesión</h1>
    </header>

    <main class="container">
        <form method="POST" action="{{ route('login.process') }}" class="form">
            @csrf
            @if ($errors->has('credenciales'))
                <div class="error">
                    {{ $errors->first('credenciales') }}
                </div>
            @endif

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" required>

            <button type="submit" class="btn">Ingresar</button>
        </form>

        <p style="margin-top: 1rem;">
            ¿No tienes cuenta?
            <a href="{{ route('registro') }}">Regístrate aquí</a>
        </p>
    </main>
</body>
</html>
