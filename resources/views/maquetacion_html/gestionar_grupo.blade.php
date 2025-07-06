<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Grupo</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
            pointer-events: none;
            z-index: 0;
        }

        .glass-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .header {
            background: transparent;
            color: white;
            padding: 2rem;
            text-align: center;
            box-shadow: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: white;
            text-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 1rem 2rem;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .header h1::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%);
            border-radius: 15px;
            z-index: -1;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
            position: relative;
            z-index: 1;
        }

        .main-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .content-section {
            padding: 2rem;
        }

        .info-card {
            background: rgba(102, 126, 234, 0.05);
            border: 1px solid rgba(102, 126, 234, 0.1);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }

        .description-text {
            font-size: 1.1rem;
            color: var(--gray-700);
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .edit-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border: 2px solid var(--primary-color);
            border-radius: 25px;
            transition: all 0.3s ease;
            display: inline-block;
            margin-left: 1rem;
        }

        .edit-link:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        .members-section {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--gray-800);
            margin: 0;
        }

        .add-member-btn {
            background: linear-gradient(135deg, var(--success-color), #059669);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .add-member-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.4);
        }

        .add-member-btn::before {
            content: '+';
            font-size: 1.2rem;
            font-weight: bold;
        }

        .members-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .member-item {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            margin-bottom: 0.8rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .member-item:hover {
            background: rgba(255, 255, 255, 1);
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .member-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .member-item:hover::before {
            transform: scaleY(1);
        }

        .member-name {
            font-weight: 600;
            color: var(--gray-800);
            font-size: 1.1rem;
        }

        .member-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-manage {
            background: rgba(102, 126, 234, 0.1);
            color: var(--primary-color);
            border: 1px solid rgba(102, 126, 234, 0.3);
        }

        .btn-manage:hover {
            background: var(--primary-color);
            color: white;
        }

        .btn-remove {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .btn-remove:hover {
            background: var(--danger-color);
            color: white;
        }

        .form-edit {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(102, 126, 234, 0.2);
            border-radius: 15px;
            padding: 2rem;
            margin-top: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .form-edit label {
            color: var(--gray-700);
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-edit input,
        .form-edit textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
        }

        .form-edit input:focus,
        .form-edit textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(102, 126, 234, 0.3), transparent);
            margin: 2rem 0;
        }

        .events-section {
            background: rgba(245, 158, 11, 0.05);
            border: 1px solid rgba(245, 158, 11, 0.1);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .events-section p {
            color: var(--warning-color);
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0;
        }

        .danger-zone {
            background: rgba(239, 68, 68, 0.05);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .danger-zone h3 {
            color: var(--danger-color);
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .btn-delete {
            background: linear-gradient(135deg, var(--danger-color), #dc2626);
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(239, 68, 68, 0.4);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 0.8rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .back-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .back-link::before {
            content: '←';
            font-size: 1.2rem;
        }

        /* Modal mejorado */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 2rem;
            width: 90%;
            max-width: 500px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(102, 126, 234, 0.2);
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--gray-800);
        }

        .users-list {
            list-style: none;
            padding: 0;
            margin: 1rem 0;
            max-height: 300px;
            overflow-y: auto;
            border: 1px solid rgba(102, 126, 234, 0.2);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.5);
        }

        .user-item {
            padding: 0.8rem 1rem;
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
            display: flex;
            align-items: center;
            gap: 0.8rem;
            transition: all 0.3s ease;
        }

        .user-item:hover {
            background: rgba(102, 126, 234, 0.1);
        }

        .user-item:last-child {
            border-bottom: none;
        }

        .user-checkbox {
            width: 18px;
            height: 18px;
            accent-color: var(--primary-color);
        }

        .search-input {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 10px;
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .modal-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 1.5rem;
        }

        .btn-cancel {
            background: rgba(107, 114, 128, 0.1);
            color: var(--gray-600);
            border: 1px solid rgba(107, 114, 128, 0.3);
        }

        .btn-cancel:hover {
            background: var(--gray-600);
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                margin: 1rem auto;
                padding: 0 0.5rem;
            }

            .header h1 {
                font-size: 2rem;
            }

            .content-section {
                padding: 1.5rem;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .member-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .member-actions {
                width: 100%;
                justify-content: flex-end;
            }

            .modal-content {
                width: 95%;
                padding: 1.5rem;
            }

            .form-edit {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-content glass-container">
            <header class="header">
                <h1>{{ $grupo->nombre_grupo }}</h1>
            </header>

            <div class="content-section">
                {{-- Información del grupo --}}
                <div class="info-card">
                    <div class="description-text">
                        <strong>Descripción:</strong> {{ $grupo->descripcion }}
                        <a href="#" onclick="mostrarFormularioEdicion()" class="edit-link">Editar</a>
                    </div>
                </div>

                {{-- Formulario de edición --}}
                <div id="formulario-edicion" class="form-edit" style="display: none;">
                    <form action="{{ route('grupos.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="nombre_grupo">Nuevo nombre:</label>
                        <input type="text" name="nombre_grupo" value="{{ $grupo->nombre_grupo }}">

                        <label for="descripcion">Nueva descripción:</label>
                        <textarea name="descripcion" rows="4">{{ $grupo->descripcion }}</textarea>

                        <button type="submit" class="btn">Guardar cambios</button>
                    </form>
                </div>

                <div class="divider"></div>

                {{-- Sección de integrantes --}}
                <div class="members-section">
                    <div class="section-header">
                        <h2 class="section-title">Integrantes ({{ count($grupo->usuarios) }})</h2>
                        <button onclick="abrirModal()" class="add-member-btn">
                            Agregar integrante
                        </button>
                    </div>

                    <ul class="members-list">
                        @foreach ($grupo->usuarios as $usuario)
                            <li class="member-item">
                                <span class="member-name">{{ $usuario->nombre }}</span>
                                <div class="member-actions">
                                    <a href="#" class="action-btn btn-manage">Gestionar</a>
                                    <a href="#" onclick="confirmarEliminacion('{{ $usuario->id }}')" class="action-btn btn-remove">Eliminar</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Formulario invisible para eliminar --}}
                <form id="formEliminar" action="" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

                <div class="divider"></div>

                {{-- Sección de eventos --}}
                <div class="events-section">
                    <p><strong>Eventos o reportes:</strong> próximamente</p>
                </div>

                {{-- Zona de peligro --}}
                <div class="danger-zone">
                    <h3>Zona de peligro</h3>
                    <p style="margin-bottom: 1rem; color: var(--gray-600);">
                        Esta acción eliminará permanentemente el grupo y no se puede deshacer.
                    </p>
                    <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este grupo?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Eliminar grupo</button>
                    </form>
                </div>

                {{-- Enlace de regreso --}}
                <div style="text-align: center;">
                    <a href="{{ route('rol.entrenador') }}" class="back-link">
                        Volver al panel de entrenador
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal mejorado --}}
    <div id="modal-agregar" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Agregar nuevos integrantes</h3>
                <button onclick="cerrarModal()" class="modal-close">×</button>
            </div>
            
            <form action="{{ route('grupos.agregarIntegrantes') }}" method="POST">
                @csrf

                <input type="text" id="buscar_usuario" class="search-input" placeholder="Buscar usuario..." onkeyup="filtrarUsuarios()">

                <ul id="lista_usuarios" class="users-list">
                    @foreach ($usuariosDisponibles as $usuario)
                        <li class="user-item">
                            <input type="checkbox" name="usuarios[]" value="{{ $usuario->id }}" class="user-checkbox">
                            <span>{{ $usuario->nombre }}</span>
                        </li>
                    @endforeach
                </ul>

                <div class="modal-actions">
                    <button type="button" onclick="cerrarModal()" class="action-btn btn-cancel">Cancelar</button>
                    <button type="submit" class="btn">Agregar seleccionados</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Scripts --}}
    <script>
        function mostrarFormularioEdicion() {
            const formulario = document.getElementById('formulario-edicion');
            formulario.style.display = formulario.style.display === 'none' ? 'block' : 'none';
        }

        function abrirModal() {
            document.getElementById('modal-agregar').style.display = 'flex';
        }

        function cerrarModal() {
            document.getElementById('modal-agregar').style.display = 'none';
        }

        function filtrarUsuarios() {
            const input = document.getElementById('buscar_usuario').value.toLowerCase();
            const usuarios = document.querySelectorAll('#lista_usuarios .user-item');

            usuarios.forEach(function (usuario) {
                const nombre = usuario.textContent.toLowerCase();
                usuario.style.display = nombre.includes(input) ? 'flex' : 'none';
            });
        }

        function confirmarEliminacion(id) {
            if (confirm("¿Estás seguro de eliminar este deportista?")) {
                const form = document.getElementById('formEliminar');
                const url = "{{ route('usuarios.destroy', ['id' => 'ID_REPLACE']) }}".replace('ID_REPLACE', id);
                form.action = url;
                form.submit();
            }
        }

        // Cerrar modal al hacer clic fuera
        document.getElementById('modal-agregar').addEventListener('click', function(e) {
            if (e.target === this) {
                cerrarModal();
            }
        });
    </script>
</body>
</html>