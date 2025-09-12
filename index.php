<<<<<<< HEAD
<?php $base=""; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bonanza Tecpán · Sistema Restaurante</title>
  <link rel="stylesheet" href="CSS/styles.css">
  <meta name="theme-color" content="#4E2A1A"/>
</head>
<body>
<header class="nav">
  <div class="container nav-inner">
    <div class="brand">
      <img src="IMAGENES/logo.png" alt="Bonanza Tecpán logo"/>
      <div class="title">Bonanza Tecpán</div>
    </div>
    <nav class="menu tabs">
      <a href="menu.php" target="_blank" class="">Menú</a>
      <a href="ordenes.php" target="_blank" class="">Órdenes</a>
      <a href="reservas.php" target="_blank" class="">Reservas</a>
      <a href="inventario.php" target="_blank" class="">Inventario</a>
    </nav>
  </div>
</header>


<section class="hero">
  <div class="container content">
    <div>
      <div class="badge">Sabor campestre</div>
      <h1>Restaurante Bonanza <span style="color:#F2992E">BONANZA</span></h1>
      <p>Gestione su restaurante con un sistema ligero y moderno: menú digital, órdenes, reservas e inventario, todo en un solo lugar.</p>
      <div class="cta">
        <a class="btn btn-primary" href="menu.php" target="_blank">Ver Menú</a>
        <a class="btn btn-ghost" href="ordenes.php" target="_blank">Ver Órdenes</a>
        <a class="btn btn-ghost" href="reservas.php" target="_blank">Reservas</a>
        <a class="btn btn-ghost" href="inventario.php" target="_blank">Inventario</a>
      </div>
      <div class="p" style="margin-top:12px;">
        <span class="badge-outline">Sin base de datos aún · Demo UI</span>
      </div>
    </div>
    <div>
      <img src="IMAGENES/logo.png" alt="Marca Bonanza" class="logo-hero"/>
    </div>
  </div>
</section>

<main class="container">
  <section class="section">
    <h2>Lo que incluye</h2>
    <div class="leads">
      <div class="lead"><div class="t">Menú atractivo</div><div>Tarjetas de platillo con precio y botón de agregar.</div></div>
      <div class="lead"><div class="t">Órdenes del día</div><div>KPIs y listado para seguimiento rápido.</div></div>
      <div class="lead"><div class="t">Reservas e inventario</div><div>Formularios y tablas listas para conectar a BD.</div></div>
    </div>
  </section>
</main>


<footer class="footer">
  Hecho por Bonanza Tecpán.
</footer>
</body>
</html>
=======
<!-- Aqui arriba va el codigo de login.php -->

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Iniciar sesión · Bonanza Tecpán</title>
  <link rel="stylesheet" href="CSS/stylelogin.css"/>
  <link rel="stylesheet" href="CSS/styles.css"/>
</head>
<body class="auth-shell">
  <main class="auth-card" role="main">
    <div class="auth-header">
      <img src="IMAGENES/logo.png" alt="Logo Bonanza Tecpán">
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
      
        <div class="helper"><a href="#" onclick="alert('Contacta a sistemas para restablecer tu contraseña.'); return false;">¿Olvidaste tu contraseña?</a></div>
      </div>

      <div class="form-row">
        <button class="btn btn-primary" type="submit" style="width:100%;">Entrar</button>
      </div>
    </form>

    <div class="footer-min">Bonanza Tecpán </div>
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

  // Validación de "login"
  const form = document.getElementById('loginForm');
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (!form.checkValidity()) {
      alert('Revisa tu contraseña (mínimo 6 caracteres).');
      return;
    }

    window.location.assign('./principal.php');
  });
  </script>
</body>
</html>
>>>>>>> bbbff4c6bfe6f6f70f739262317ca93591e908ae
