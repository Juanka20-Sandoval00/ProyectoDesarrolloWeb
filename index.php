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