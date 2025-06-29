<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Equipos Deportivos</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 30px;
            text-align: center;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 15px 40px;
            border: none;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .descripcion {
            text-align: center;
            font-size: 18px;
            max-width: 800px;
            margin: auto;
            padding: 0 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Gestión de Equipos Deportivos</h1>
    </div>

    <div class="btn-container">
        <a href="{{ route('login') }}" class="btn">Iniciar Sesión</a>
        <a href="{{ route('registro') }}" class="btn">Registrarse</a>
    </div>

    <div class="descripcion">
        <h2>Bienvenido</h2>
        <p>
            Esta plataforma permite registrar usuarios, gestionar equipos y llevar control de entrenamientos y eventos deportivos. 
            Selecciona una opción para empezar.
        </p>
    </div>
</body>
</html>
