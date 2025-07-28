<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Entrenador - Gestión de Equipos Deportivos</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23pattern)"/></svg>');
            pointer-events: none;
            z-index: -1;
        }

        .header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 2rem 0;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            color: white;
            font-size: 2.5rem;
            font-weight: 300;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .header-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            font-weight: 300;
        }

        .container {
            flex: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .status-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-left: 5px solid #28a745;
            display: flex;
            align-items: center;
            gap: 1rem;
            position: relative;
            overflow: hidden;
        }

        .status-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .status-card:hover::before {
            transform: translateX(100%);
        }

        .status-card.no-group {
            border-left-color: #ffc107;
        }

        .status-icon {
            font-size: 3rem;
            opacity: 0.8;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .status-content {
            flex: 1;
        }

        .status-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .status-description {
            color: #666;
            font-size: 1rem;
            line-height: 1.5;
        }

        .group-name {
            color: #667eea;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .group-info-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 2rem;
        }

        .group-info-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(102, 126, 234, 0.1);
        }

        .group-info-header h3 {
            color: #333;
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0;
        }

        .edit-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .edit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .group-details {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .detail-item {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            background: rgba(248, 249, 250, 0.8);
            border-radius: 12px;
            border-left: 4px solid #667eea;
            transition: all 0.3s ease;
        }

        .detail-item:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateX(5px);
        }

        .detail-item strong {
            color: #333;
            min-width: 100px;
            font-weight: 600;
        }

        .edit-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 2px solid rgba(102, 126, 234, 0.1);
        }

        .form-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(40, 167, 69, 0.3);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(108, 117, 125, 0.3);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .action-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            color: inherit;
            display: block;
            position: relative;
            overflow: hidden;
        }

        .action-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .action-card:hover::before {
            transform: translateX(100%);
        }

        .action-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
            border-color: rgba(102, 126, 234, 0.3);
        }

        .action-card.gestionar {
            border-top: 4px solid #667eea;
        }

        .action-card.entrenamientos {
            border-top: 4px solid #28a745;
        }

        .action-card.reportes {
            border-top: 4px solid #dc3545;
        }

        .action-card-header {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .action-icon {
            font-size: 3.5rem;
            opacity: 0.9;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
            transition: all 0.3s ease;
        }

        .action-card:hover .action-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .action-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .action-subtitle {
            font-size: 0.9rem;
            color: #666;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .action-description {
            color: #666;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .action-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .feature-tag {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            color: #667eea;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            border: 1px solid rgba(102, 126, 234, 0.2);
        }

        .action-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #667eea;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .action-cta:hover {
            color: #5a6fd8;
            transform: translateX(5px);
        }

        .action-cta::after {
            content: '→';
            transition: transform 0.3s ease;
        }

        .action-cta:hover::after {
            transform: translateX(5px);
        }

        .form-wrapper {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-top: 1rem;
        }

        .form-title {
            text-align: center;
            color: #333;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 2rem;
            position: relative;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        label {
            color: #555;
            font-weight: 500;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        input[type="text"],
        textarea {
            padding: 1rem;
            border: 2px solid rgba(225, 229, 233, 0.5);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(248, 249, 250, 0.8);
            font-family: inherit;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 1rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn:active {
            transform: translateY(0);
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            padding: 1.5rem;
            border-radius: 15px;
            border: 1px solid #c3e6cb;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 4px 15px rgba(21, 87, 36, 0.1);
        }

        .alert-success::before {
            content: '✅';
            font-size: 1.5rem;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            align-self: flex-start;
        }

        .back-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .back-link::before {
            content: '🏠';
            font-size: 1.2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }
            
            .container {
                padding: 1rem;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
            
            .status-card {
                flex-direction: column;
                text-align: center;
            }
            
            .form-wrapper {
                padding: 1.5rem;
            }

            .action-card {
                padding: 2rem;
            }
        }

        /* Animaciones */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .status-card,
        .group-info-card,
        .action-card,
        .form-wrapper {
            animation: fadeInUp 0.6s ease-out;
        }

        .action-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .action-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .action-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .action-icon {
            animation: pulse 2s infinite;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Bienvenido, Entrenador {{ $usuario->nombre }}</h1>
        <p class="header-subtitle">Panel de control para gestión deportiva</p>
    </header>

    <main class="container">
        @if ($grupo)
            @if (session('success'))
                <div class="alert-success" style="background: #d4edda; color: #155724; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #c3e6cb;">
                    {{ session('success') }}
                </div>
            @endif
        
            <!-- Usuario CON grupo -->
            <div class="status-card">
                <div class="status-icon">🏆</div>
                <div class="status-content">
                    <div class="status-title">¡Grupo activo!</div>
                    <div class="status-description">
                        Ya estás asociado al grupo: <span class="group-name">{{ $grupo->nombre_grupo }}</span>
                    </div>
                </div>
            </div>

            <!-- Información del grupo -->
            <div class="group-info-card">
                <div class="group-info-header">
                    <h3>📋 Información del Grupo</h3>
                    <button class="edit-btn" onclick="toggleEditMode()">✏️ Editar</button>
                </div>
                
                <div class="group-details" id="groupDetails">
                    <div class="detail-item">
                        <strong>Nombre:</strong> {{ $grupo->nombre_grupo }}
                    </div>
                    <div class="detail-item">
                        <strong>Descripción:</strong> {{ $grupo->descripcion ?? 'Sin descripción' }}
                    </div>
                </div>

                <!-- Formulario de edición (oculto por defecto) -->
                <form action="{{ route('grupos.update') }}" method="POST" class="edit-form" id="editForm" style="display: none;">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label for="edit_nombre_grupo">
                            <span>🏅</span>
                            Nombre del grupo:
                        </label>
                        <input type="text" id="edit_nombre_grupo" name="nombre_grupo" 
                               value="{{ $grupo->nombre_grupo }}" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_descripcion">
                            <span>📝</span>
                            Descripción:
                        </label>
                        <textarea id="edit_descripcion" name="descripcion" rows="3">{{ $grupo->descripcion }}</textarea>
                    </div>

                    <div class="form-buttons">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        <button type="button" class="btn btn-secondary" onclick="toggleEditMode()">Cancelar</button>
                    </div>
                </form>
            </div>

            <div class="actions-grid">
                <a href="{{ route('grupos.gestionar') }}" class="action-card gestionar">
                    <div class="action-card-header">
                        <div class="action-icon">👥</div>
                        <div>
                            <div class="action-title">Gestionar Grupo</div>
                            <div class="action-subtitle">Administración</div>
                        </div>
                    </div>
                    <div class="action-description">
                        Administra los miembros de tu equipo, revisa estadísticas personales y gestiona toda la información del grupo de manera integral.
                    </div>
                    <div class="action-features">
                        <span class="feature-tag">Miembros</span>
                        <span class="feature-tag">Estadísticas</span>
                        <span class="feature-tag">Perfiles</span>
                    </div>
                    <div class="action-cta">Ir a gestión</div>
                </a>

                <a href="#" class="action-card entrenamientos">
                    <div class="action-card-header">
                        <div class="action-icon">💪</div>
                        <div>
                            <div class="action-title">Entrenamientos</div>
                            <div class="action-subtitle">Planificación</div>
                        </div>
                    </div>
                    <div class="action-description">
                        Planifica y programa entrenamientos efectivos, revisa el progreso individual y grupal, y ajusta las rutinas según los objetivos.
                    </div>
                    <div class="action-features">
                        <span class="feature-tag">Planificación</span>
                        <span class="feature-tag">Progreso</span>
                        <span class="feature-tag">Rutinas</span>
                    </div>
                    <div class="action-cta">Planificar entrenamiento</div>
                </a>

                <a href="#" class="action-card reportes">
                    <div class="action-card-header">
                        <div class="action-icon">📊</div>
                        <div>
                            <div class="action-title">Reportes</div>
                            <div class="action-subtitle">Análisis</div>
                        </div>
                    </div>
                    <div class="action-description">
                        Analiza el rendimiento del equipo con métricas detalladas, genera reportes profesionales y toma decisiones basadas en datos.
                    </div>
                    <div class="action-features">
                        <span class="feature-tag">Métricas</span>
                        <span class="feature-tag">Análisis</span>
                        <span class="feature-tag">Exportar</span>
                    </div>
                    <div class="action-cta">Ver reportes</div>
                </a>
            </div>

        @else
            <!-- Usuario SIN grupo -->
            <div class="status-card no-group">
                <div class="status-icon">⚠️</div>
                <div class="status-content">
                    <div class="status-title">Sin grupo asignado</div>
                    <div class="status-description">
                        No tienes un grupo de entrenamiento asociado. Crea uno para comenzar a gestionar tu equipo.
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert-success" style="background: #d4edda; color: #155724; padding: 10px; margin: 10px 0; border-radius: 5px; border: 1px solid #c3e6cb;">
                    {{ session('success') }}
                </div>
            @endif

            <div class="form-wrapper">
                <h2 class="form-title">Crear Nuevo Grupo</h2>
                
                <form action="{{ route('grupos.store') }}" method="POST" class="form">
                    @csrf
                    
                    <div class="form-group">
                        <label for="nombre_grupo">
                            <span>🏅</span>
                            Nombre del grupo:
                        </label>
                        <input type="text" id="nombre_grupo" name="nombre_grupo" required 
                               placeholder="Ej: Equipo Águilas, Leones FC, etc.">
                    </div>

                    <div class="form-group">
                        <label for="descripcion">
                            <span>📝</span>
                            Descripción:
                        </label>
                        <textarea id="descripcion" name="descripcion" rows="3" 
                                  placeholder="Describe brevemente los objetivos y características del grupo..."></textarea>
                    </div>

                    <button type="submit" class="btn">Crear grupo de entrenamiento</button>
                </form>
            </div>
        @endif

        <a href="{{ route('inicio') }}" class="back-link">Volver a la página principal</a>
    </main>

    <script>
        function toggleEditMode() {
            const details = document.getElementById('groupDetails');
            const form = document.getElementById('editForm');
            
            if (form.style.display === 'none') {
                details.style.display = 'none';
                form.style.display = 'flex';
            } else {
                details.style.display = 'flex';
                form.style.display = 'none';
            }
        }

        // Mostrar mensaje de éxito con SweetAlert2
        @if (session('success'))
            // Si tienes SweetAlert2 cargado
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false
                });
            } else {
                // Fallback si no tienes SweetAlert2
                alert('{{ session('success') }}');
            }
        @endif

        // Efecto de partículas en el fondo
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.action-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
</body>
</html>