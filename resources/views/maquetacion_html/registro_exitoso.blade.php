<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Exitoso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 80px;
        }
        h1 {
            color: green;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>¡Registro exitoso!</h1>
    <p>El usuario ha sido registrado correctamente.</p>
    <a href="{{ url('/registro') }}">Registrar otro usuario</a>
</body>
</html>
