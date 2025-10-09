<?php include 'SideBarEmpleado.php'; ?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menú y Platillos</title>
  <link rel="stylesheet" href="CSS/styles.css">
  <meta name="theme-color" content="#4E2A1A"/>
</head>
<body class="min-h-screen bg-gray-50 text-gray-800">
<div class="flex min-h-screen">
  <!-- ==================== Menu ==================== -->
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

</div>
</body>
</html>