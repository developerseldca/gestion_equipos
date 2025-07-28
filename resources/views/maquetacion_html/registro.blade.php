<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Gestión de Equipos Deportivos</title>
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
        }

        .header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1.5rem 0;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            color: white;
            font-size: 2.5rem;
            font-weight: 300;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .form-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            transform: translateY(0);
            transition: all 0.3s ease;
        }

        .form-wrapper:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
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

        #registroForm {
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

        .label-icon {
            width: 16px;
            height: 16px;
            opacity: 0.7;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 1rem;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        input:valid {
            border-color: #28a745;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 1rem;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 2rem;
            color: #666;
            font-size: 0.95rem;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        /* Validación visual */
        .form-group.error input {
            border-color: #dc3545;
            background-color: #fff5f5;
        }

        .form-group.success input {
            border-color: #28a745;
            background-color: #f8fff8;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 0.25rem;
            display: none;
        }

        .success-message {
            color: #28a745;
            font-size: 0.85rem;
            margin-top: 0.25rem;
            display: none;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .header h1 {
                font-size: 2rem;
            }
            
            .form-wrapper {
                padding: 2rem;
                margin: 1rem;
            }
            
            main {
                padding: 1rem;
            }
        }

        /* Indicador de fuerza de contraseña */
        .password-strength {
            height: 4px;
            background: #e1e5e9;
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak { background: #dc3545; width: 33%; }
        .strength-medium { background: #ffc107; width: 66%; }
        .strength-strong { background: #28a745; width: 100%; }
    </style>
</head>
<body>
    <header class="header">
        <h1>Registrar Usuario</h1>
    </header>
    
    <main>
        <div class="form-wrapper">
            <h2 class="form-title">Crear Cuenta</h2>
            
            <form action="{{ route('usuarios.store') }}" method="POST" id="registroForm">
                @csrf

                <div class="form-group">
                    <label for="nombre">
                        <span>👤</span>
                        Nombre completo:
                    </label>
                    <input type="text" id="nombre" name="nombre" required minlength="2" maxlength="50">
                    <div class="error-message">El nombre debe tener entre 2 y 50 caracteres</div>
                </div>

                <div class="form-group">
                    <label for="identificacion">
                        <span>🆔</span>
                        Identificación:
                    </label>
                    <input type="text" id="identificacion" name="identificacion" required minlength="6" maxlength="20">
                    <div class="error-message">La identificación debe tener entre 6 y 20 caracteres</div>
                </div>

                <div class="form-group">
                    <label for="email">
                        <span>📧</span>
                        Correo electrónico:
                    </label>
                    <input type="email" id="email" name="email" required>
                    <div class="error-message">Por favor, ingresa un correo válido</div>
                </div>

                <div class="form-group">
                    <label for="password">
                        <span>🔒</span>
                        Contraseña:
                    </label>
                    <input type="password" id="password" name="password" required minlength="8">
                    <div class="password-strength">
                        <div class="password-strength-bar" id="strengthBar"></div>
                    </div>
                    <div class="error-message">La contraseña debe tener al menos 8 caracteres</div>
                </div>

                <button type="submit" class="btn">Registrar</button>
            </form>

            <div class="login-link">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}">Inicia sesión aquí</a>
            </div>
        </div>
    </main>

 <script>
    // 🔁 Validación en tiempo real de los campos del formulario
    document.getElementById('registroForm').addEventListener('input', function(e) {
        const field = e.target;
        const formGroup = field.closest('.form-group');
        const errorMsg = formGroup.querySelector('.error-message');

        // 🧼 Limpiar clases previas
        formGroup.classList.remove('error', 'success');
        errorMsg.style.display = 'none';

        // ✅ Si el campo es válido, aplicar clase 'success', si no, 'error'
        if (field.checkValidity()) {
            formGroup.classList.add('success');
        } else {
            formGroup.classList.add('error');
            errorMsg.style.display = 'block';
        }
    });

    // 💪 Indicador visual de la fuerza de la contraseña
    document.getElementById('password').addEventListener('input', function(e) {
        const password = e.target.value;
        const strengthBar = document.getElementById('strengthBar');

        let strength = 0;
        if (password.length >= 8) strength++; // mínimo de caracteres
        if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++; // letras mayúsculas y minúsculas
        if (password.match(/[0-9]/)) strength++; // números
        if (password.match(/[^a-zA-Z0-9]/)) strength++; // caracteres especiales

        // 🧼 Limpiar clases anteriores
        strengthBar.className = 'password-strength-bar';

        // 🟠 Debil
        if (strength === 1) {
            strengthBar.classList.add('strength-weak');
        }
        // 🟡 Media
        else if (strength === 2 || strength === 3) {
            strengthBar.classList.add('strength-medium');
        }
        // 🟢 Fuerte
        else if (strength === 4) {
            strengthBar.classList.add('strength-strong');
        }
    });
    // Script para mostrar alerta de éxito
@if(session('registro_exitoso'))
    Swal.fire({
        title: '¡Registro Exitoso!',
        text: 'Tu cuenta ha sido creada correctamente. Serás redirigido al login.',
        icon: 'success',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false,
        allowOutsideClick: false
    }).then(() => {
        window.location.href = "{{ route('login') }}";
    });
@endif
</script>
</body>
</html>