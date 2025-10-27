<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Iniciar sesión · Bonanza Tecpán</title>
  <link rel="stylesheet" href="CSS/stylelogin.css"/>
  <link rel="stylesheet" href="CSS/styles.css"/>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="auth-shell">
  <main class="auth-card" role="main">
    <div class="auth-header">
      <img src="IMG/logo.png" alt="Logo Bonanza Tecpán">
      <div>
        <div class="auth-title">Bonanza Tecpán</div>
        <div class="auth-sub">Acceso al sistema</div>
      </div>
    </div>

    <form id="loginForm" novalidate>
      <div class="form-row">
        <label for="usuario"><strong>Usuario o correo</strong></label>
        <input id="usuario" name="usuario" class="input" type="text" placeholder="Ingrese su usuario" required autocomplete="username">
      </div>

      <div class="form-row field">
        <label for="password"><strong>Contraseña</strong></label>
        <input id="password" name="password" class="input" type="password" required minlength="6" autocomplete="current-password">
        <button class="toggle-eye" type="button" aria-label="Mostrar u ocultar contraseña" title="Mostrar/ocultar">👁</button>
      </div>

      <div class="row-inline">
        <div class="helper">
          <a href="#" onclick="Swal.fire('Recuperación de contraseña', 'Contacta a sistemas para restablecer tu contraseña.', 'info'); return false;">
            ¿Olvidaste tu contraseña?
          </a>
        </div>
      </div>

      <div class="form-row">
        <button class="btn btn-primary" type="submit" style="width:100%;">Entrar</button>
      </div>
    </form>

    <div class="footer-min">Bonanza Tecpán</div>
  </main>

  <script>
  // Mostrar/Ocultar contraseña
  const eyeBtn = document.querySelector('.toggle-eye');
  const pwd = document.getElementById('password');
  eyeBtn.addEventListener('click', () => {
    const isPwd = pwd.type === 'password';
    pwd.type = isPwd ? 'text' : 'password';
    eyeBtn.textContent = isPwd ? '👀' : '👁️';
  });

  // Validación de login con SweetAlert2
  const form = document.getElementById('loginForm');
  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const usuario = document.getElementById('usuario').value.trim();
    const password = document.getElementById('password').value.trim();

    if (usuario === '' || password === '') {
      Swal.fire({
        icon: 'warning',
        title: 'Campos vacíos',
        text: 'Por favor completa todos los campos.'
      });
      return;
    }

    if (password.length < 6) {
      Swal.fire({
        icon: 'error',
        title: 'Contraseña inválida',
        text: 'La contraseña debe tener al menos 6 caracteres.'
      });
      return;
    }

    // Simulación de inicio de sesión correcto
    Swal.fire({
      icon: 'success',
      title: 'Acceso concedido',
      text: 'Redirigiendo al sistema...',
      showConfirmButton: false,
      timer: 1800
    }).then(() => {
      window.location.assign('principal.php');
    });
  });
  </script>
</body>
</html>
