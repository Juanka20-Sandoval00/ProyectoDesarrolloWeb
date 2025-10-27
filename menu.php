<?php $base=""; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menú · Bonanza Tecpán</title>
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
      <a href="menu.php" target="_blank" class="active">Menú</a>
      <a href="ordenes.php" target="_blank" class="">Órdenes</a>
      <a href="reservas.php" target="_blank" class="">Reservas</a>
      <a href="inventario.php" target="_blank" class="">Inventario</a>
    </nav>
  </div>
</header>


<main class="container section">
  <h2>Menú</h2>
  <div class="grid-3">
    <article class="card">
      <img class="cover" alt="Carne asada" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='400'%3E%3Crect width='100%25' height='100%25' fill='%23F3E6DA'/%3E%3C/svg%3E"/>
      <div class="p">
        <div class="title">Carne Asada Ranchera</div>
        <div class="meta">Con frijoles charros y tortillas</div>
        <div class="p" style="display:flex; align-items:center; justify-content:space-between; padding:0;">
          <span class="price">Q 65.00</span>
          <button class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </article>
    <article class="card">
      <img class="cover" alt="Enchiladas" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='400'%3E%3Crect width='100%25' height='100%25' fill='%23F3E6DA'/%3E%3C/svg%3E"/>
      <div class="p">
        <div class="title">Enchiladas Bonanza</div>
        <div class="meta">Salsa de la casa con queso fresco</div>
        <div class="p" style="display:flex; align-items:center; justify-content:space-between; padding:0;">
          <span class="price">Q 32.00</span>
          <button class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </article>
    <article class="card">
      <img class="cover" alt="Café de olla" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='800' height='400'%3E%3Crect width='100%25' height='100%25' fill='%23F3E6DA'/%3E%3C/svg%3E"/>
      <div class="p">
        <div class="title">Café de Olla</div>
        <div class="meta">Canela y piloncillo</div>
        <div class="p" style="display:flex; align-items:center; justify-content:space-between; padding:0;">
          <span class="price">Q 15.00</span>
          <button class="btn btn-primary">Agregar</button>
        </div>
      </div>
    </article>
  </div>
</main>


<footer class="footer">
  Hecho por Bonanza Tecpán.
</footer>
</body>
</html>