<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Equipos Deportivos</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <style>
        /* Estilos específicos para la página de inicio */
        body.home-page {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            /* Imagen de fondo referente a la tematica de la app web */
            background: url("{{ asset('images/deporte-fondo.jpg') }}") no-repeat center center fixed;
            background-size: cover;
        }

        /* Overlay oscuro para mejorar la legibilidad */
        .home-page::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 0;
        }

        .home-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .welcome-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 40px 35px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 520px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .welcome-card h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #2c3e50;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .welcome-subtitle {
            color: #34495e;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            font-weight: 400;
        }

        .app-description {
            background: rgba(52, 152, 219, 0.08);
            padding: 25px;
            border-radius: 12px;
            margin: 25px 0;
            border-left: 4px solid #3498db;
            text-align: left;
        }

        .app-description h3 {
            color: #2980b9;
            margin-bottom: 15px;
            font-size: 1.2rem;
            font-weight: 600;
        }

        .app-description p {
            color: #34495e;
            line-height: 1.6;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .features-list li {
            padding: 6px 0;
            color: #34495e;
            position: relative;
            padding-left: 20px;
            font-size: 0.9rem;
        }

        .features-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #27ae60;
            font-weight: bold;
        }

        .button-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .home-btn {
            background: #3498db;
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .home-btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
        }

        .home-btn.secondary {
            background: #27ae60;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
        }

        .home-btn.secondary:hover {
            background: #219a52;
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
        }

        @media (max-width: 768px) {
            .welcome-card {
                padding: 30px 25px;
                margin: 20px;
            }

            .welcome-card h1 {
                font-size: 2rem;
            }

            .welcome-subtitle {
                font-size: 1rem;
            }

            .button-container {
                flex-direction: column;
                gap: 12px;
            }

            .home-btn {
                width: 100%;
                text-align: center;
            }

            .app-description {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .welcome-card h1 {
                font-size: 1.7rem;
            }
            
            .welcome-subtitle {
                font-size: 0.95rem;
            }
        }
    </style>
</head>
<body class="home-page">
    <div class="home-container">
        <div class="welcome-card">
            <h1>Bienvenidos</h1>
            <p class="welcome-subtitle">Sistema de Gestión de Equipos Deportivos</p>
            
            <div class="app-description">
                <h3>🏆 ¿Qué es nuestra plataforma?</h3>
                <p>Una solución completa para la gestión integral de equipos deportivos, diseñada para entrenadores y deportistas que buscan optimizar su rendimiento y organización.</p>
                
                <h3>📋 Características principales:</h3>
                <ul class="features-list">
                    <li>Gestión completa de equipos y grupos deportivos</li>
                    <li>Control de integrantes y roles específicos</li>
                    <li>Dashboard personalizado por tipo de usuario</li>
                    <li>Sistema de reportes y seguimiento</li>
                    <li>Interfaz intuitiva y responsive</li>
                </ul>
            </div>

            <div class="button-container">
                <a href="{{ route('login') }}" class="home-btn">
                    🔑 Iniciar Sesión
                </a>
                <a href="{{ route('registro') }}" class="home-btn secondary">
                    📝 Registrarse
                </a>
            </div>
        </div>
    </div>
</body>
</html>