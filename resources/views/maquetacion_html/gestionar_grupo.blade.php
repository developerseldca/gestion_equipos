<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Grupo</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <header class="header">
        <h1>Detalles del Grupo: {{ $grupo->nombre_grupo }}</h1>
    </header>

    <main class="container">

        {{-- Descripción del grupo y botón editar --}}
        <p>
            <strong>Descripción:</strong> {{ $grupo->descripcion }}
            <a href="#" onclick="mostrarFormularioEdicion()">[Editar]</a>
        </p>

        {{-- Formulario oculto de edición --}}
        <div id="formulario-edicion" style="display: none; margin-top: 1rem;">
            <form action="{{ route('grupos.update') }}" method="POST">
                @csrf
                @method('PUT')

                <label for="nombre_grupo">Nuevo nombre:</label>
                <input type="text" name="nombre_grupo" value="{{ $grupo->nombre_grupo }}">

                <label for="descripcion">Nueva descripción:</label>
                <textarea name="descripcion">{{ $grupo->descripcion }}</textarea>

                <button type="submit" class="btn">Guardar cambios</button>
            </form>
        </div>

        <hr>

        {{-- Título e integrantes --}}
        <h2>Integrantes ({{ count($grupo->usuarios) }})
            <button onclick="abrirModal()" style="white-space: nowrap; padding: 6px 12px; font-size: 14px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Agregar nuevo integrante
            </button>
        </h2>

        {{-- Lista de integrantes --}}
        <ul>
            @foreach ($grupo->usuarios as $usuario)
                <li>
                    {{ $usuario->nombre }}
                    <a href="#">[Ver/Gestionar]</a>
                    <a href="#" onclick="confirmarEliminacion('{{ $usuario->id }}')">[Eliminar]</a>
                </li>
            @endforeach
        </ul>

        {{-- Formulario invisible para eliminar deportista --}}
        <form id="formEliminar" action="" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>

        <hr>

        <p><strong>Eventos o reportes:</strong> próximamente</p>

        {{-- Botón para eliminar el grupo --}}
        <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este grupo?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">Eliminar grupo</button>
        </form>

        <p style="margin-top: 1rem;">
            <a href="{{ route('rol.entrenador') }}">Volver al panel de entrenador</a>
        </p>
    </main>

    {{-- Modal emergente para agregar integrantes --}}
    <div id="modal-agregar" style="display: none; position: fixed; top: 0; left: 0;
         width: 100%; height: 100%; background: rgba(0,0,0,0.5);">
        <div style="background: white; width: 400px; margin: 10% auto; padding: 20px; border-radius: 5px; position: relative;">
            <h3>Agregar nuevos integrantes</h3>
            <form action="{{ route('grupos.agregarIntegrantes') }}" method="POST">
                @csrf

                <label for="buscar_usuario">Buscar usuario:</label>
                <input type="text" id="buscar_usuario" placeholder="Buscar..." onkeyup="filtrarUsuarios()">

                <ul id="lista_usuarios" style="list-style: none; padding: 0; max-height: 200px; overflow-y: auto;">
                    @foreach ($usuariosDisponibles as $usuario)
                        <li>
                            <label>
                                <input type="checkbox" name="usuarios[]" value="{{ $usuario->id }}">
                                {{ $usuario->nombre }}
                            </label>
                        </li>
                    @endforeach
                </ul>

                <button type="submit">Agregar seleccionados</button>
                <button type="button" onclick="cerrarModal()" style="margin-left: 10px;">Cancelar</button>
            </form>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script>
        function mostrarFormularioEdicion() {
            document.getElementById('formulario-edicion').style.display = 'block';
        }

        function abrirModal() {
            document.getElementById('modal-agregar').style.display = 'block';
        }

        function cerrarModal() {
            document.getElementById('modal-agregar').style.display = 'none';
        }

        function filtrarUsuarios() {
            let input = document.getElementById('buscar_usuario').value.toLowerCase();
            let usuarios = document.querySelectorAll('#lista_usuarios li');

            usuarios.forEach(function (usuario) {
                let nombre = usuario.textContent.toLowerCase();
                usuario.style.display = nombre.includes(input) ? 'block' : 'none';
            });
        }

        function confirmarEliminacion(id) {
        if (confirm("¿Estás seguro de eliminar este deportista?")) {
            const form = document.getElementById('formEliminar');
            const url = "{{ route('usuarios.destroy', ['id' => 'ID_REPLACE']) }}".replace('ID_REPLACE', id);
            console.log('URL de eliminación:', url); // <-- Agregado
            form.action = url;
            form.submit();
        }
}

    </script>
</body>
</html>