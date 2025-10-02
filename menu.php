<?php $base=""; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Menú Bonanza Tecpán</title>
  <!-- tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="CSS/styles.css">
  <meta name="theme-color" content="#4E2A1A"/>
</head>
<body class="min-h-screen bg-gray-50 text-gray-800">
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#4E2A1A] text-white flex flex-col">
      <div class="px-5 py-6 flex items-center gap-3 border-b border-white/10">
        <img src="IMG/logo.png" alt="Bonanza Tecpán" class="w-10 h-10 rounded-full object-contain bg-white/10 p-1">
        <div>
          <p class="text-lg font-semibold leading-none"><a href="principal.php">Bonanza</a></p>
        </div>
      </div>

      <nav class="p-3 space-y-1">
        <!-- Agrega la clase 'bg-[#F2992E] text-black' al enlace activo -->
        <a href="menu.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
          <!-- icono menú -->
          <img src="IMG/icono_MenuPrincipal.png" alt="iconoMenú" class="w-6 h-6 shrink-0">
          <span>Menú</span>
        </a>

        <a href="ordenes.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
          <!-- icono órdenes -->
          <img src="IMG/icono_Mesero.png" alt="iconoÓrdenes" class="w-6 h-6 shrink-0">
          <span>Órdenes</span>
        </a>

        <a href="reservas.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
          <!-- icono reservas -->
          <img src="IMG/icono_Reservacion.png" alt="iconoReservas" class="w-6 h-6 shrink-0">
          <span>Reservas</span>
        </a>

        <a href="inventario.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
          <!-- icono inventario -->
          <img src="IMG/icono_Inventario.png" alt="iconoInventario" class="w-6 h-6 shrink-0">
          <span>Inventario</span>
        </a>

        <a href="registro.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
          <!-- icono inventario -->
          <img src="IMG/icono_Registro.png" alt="iconoInventario" class="w-6 h-6 shrink-0">
          <span>Registrar Empleado</span>
        </a>
      </nav>

        <a href="login.php" target="_blank" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
          <!-- icono inventario -->
          <img src="IMG/icono_CerrarSesion.png" alt="iconoInventario" class="w-6 h-6 shrink-0">
          <span><b>Cerrar Sesion</b></span>
        </a>
      
      <div class="mt-auto p-4 text-xs text-white/70 border-t border-white/10 text-center">
        © <?php echo date('Y'); ?> Bonanza Tecpán
      </div>
    </aside>

    <!-- Contenido principal -->
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