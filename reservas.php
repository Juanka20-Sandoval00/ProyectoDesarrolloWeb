<?php $base=""; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reservas · Bonanza Tecpán</title>
  <link rel="stylesheet" href="CSS/styles.css">
  <meta name="theme-color" content="#4E2A1A"/>
</head>
<body>
<header class="nav">
  <div class="container nav-inner">
    <div class="brand">
      <img src="IMG/logo.png" alt="Bonanza Tecpán logo"/>
      <div class="title">Bonanza Tecpán</div>
    </div>
    <nav class="menu tabs">
      <a href="menu.php" target="_blank" class="">Menú</a>
      <a href="ordenes.php" target="_blank" class="">Órdenes</a>
      <a href="reservas.php" target="_blank" class="active">Reservas</a>
      <a href="inventario.php" target="_blank" class="">Inventario</a>
    </nav>
  </div>
</header>


<main class="container section">
  <h2>Reservas</h2>
  <div class="card p">
    <div class="p">
      <label>Fecha<br/><input type="date" style="padding:10px; border-radius:8px; border:1px solid var(--bone-200);"></label>
    </div>
    <div class="p" style="display:grid; grid-template-columns: 1fr 1fr; gap: 12px;">
      <label>Nombre<br/><input type="text" placeholder="Cliente" style="padding:10px; border-radius:8px; border:1px solid var(--bone-200);"></label>
      <label>Personas<br/><input type="number" min="1" value="2" style="padding:10px; border-radius:8px; border:1px solid var(--bone-200);"></label>
    </div>
    <div class="p" style="display:flex; gap: 12px;">
      <button class="btn btn-primary">Guardar</button>
      <button class="btn btn-ghost">Limpiar</button>
    </div>
  </div>
</main>


<footer class="footer">
  Hecho por Bonanza Tecpán.
</footer>
</body>
</html>