<?php $base=""; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventario · Bonanza Tecpán</title>
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
      <a href="reservas.php" target="_blank" class="">Reservas</a>
      <a href="inventario.php" target="_blank" class="active">Inventario</a>
    </nav>
  </div>
</header>


<main class="container section">
  <h2>Inventario</h2>
  <div class="card p" style="margin-bottom:12px;">
    <div style="display:flex; gap:12px; flex-wrap:wrap;">
      <input type="text" placeholder="Buscar producto..." style="padding:10px; border-radius:8px; border:1px solid var(--bone-200); flex:1;">
      <button class="btn btn-ghost">Filtrar</button>
      <button class="btn btn-primary">Nuevo</button>
    </div>
  </div>
  <div class="card p">
    <table style="width:100%; border-collapse: collapse;">
      <thead>
        <tr style="background: var(--bone-200);">
          <th style="text-align:left; padding:10px;">Producto</th>
          <th style="text-align:right; padding:10px;">Stock</th>
          <th style="text-align:right; padding:10px;">Costo</th>
          <th style="text-align:right; padding:10px;">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="padding:10px; border-top: 1px solid var(--bone-200);">Carne de res</td>
          <td style="padding:10px; border-top: 1px solid var(--bone-200); text-align:right;">12 kg</td>
          <td style="padding:10px; border-top: 1px solid var(--bone-200); text-align:right;">Q 95.00</td>
          <td style="padding:10px; border-top: 1px solid var(--bone-200); text-align:right;"><button class="btn btn-ghost">Editar</button></td>
        </tr>
        <tr>
          <td style="padding:10px; border-top: 1px solid var(--bone-200);">Queso fresco</td>
          <td style="padding:10px; border-top: 1px solid var(--bone-200); text-align:right;">8 kg</td>
          <td style="padding:10px; border-top: 1px solid var(--bone-200); text-align:right;">Q 42.00</td>
          <td style="padding:10px; border-top: 1px solid var(--bone-200); text-align:right;"><button class="btn btn-ghost">Editar</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</main>


<footer class="footer">
  Hecho por Bonanza Tecpán.
</footer>
</body>
</html>