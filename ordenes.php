<?php $base=""; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Órdenes · Bonanza Tecpán</title>
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
      <a href="ordenes.php" target="_blank" class="active">Órdenes</a>
      <a href="reservas.php" target="_blank" class="">Reservas</a>
      <a href="inventario.php" target="_blank" class="">Inventario</a>
    </nav>
  </div>
</header>


<main class="container section">
  <h2>Órdenes</h2>
  <div class="kpi">
    <div class="item"><div class="num">38</div><div class="lbl">Órdenes activas</div></div>
    <div class="item"><div class="num">Q 1,245</div><div class="lbl">Ventas del día</div></div>
    <div class="item"><div class="num">12/24</div><div class="lbl">Mesas ocupadas</div></div>
    <div class="item"><div class="num">58</div><div class="lbl">Clientes atendidos</div></div>
  </div>
  <div class="card p" style="margin-top:16px;">
    <table style="width:100%; border-collapse:collapse;">
      <thead>
        <tr style="background: var(--bone-200);">
          <th style="text-align:left; padding:10px;">#</th>
          <th style="text-align:left; padding:10px;">Mesa</th>
          <th style="text-align:left; padding:10px;">Cliente</th>
          <th style="text-align:right; padding:10px;">Total</th>
          <th style="text-align:right; padding:10px;">Estado</th>
          <th style="text-align:right; padding:10px;">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="padding:10px; border-top:1px solid var(--bone-200);">1245</td>
          <td style="padding:10px; border-top:1px solid var(--bone-200);">M-05</td>
          <td style="padding:10px; border-top:1px solid var(--bone-200);">Perez</td>
          <td style="padding:10px; border-top:1px solid var(--bone-200); text-align:right;">Q 165.00</td>
          <td style="padding:10px; border-top:1px solid var(--bone-200); text-align:right;">Preparando</td>
          <td style="padding:10px; border-top:1px solid var(--bone-200); text-align:right;"><button class="btn btn-ghost">Ver</button></td>
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