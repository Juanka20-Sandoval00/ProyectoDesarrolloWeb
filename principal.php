<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Bonanza</title>
  <!-- tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="theme-color" content="#4E2A1A"/>
</head>

<body class="min-h-screen bg-gray-50 text-gray-800">

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-[#4E2A1A] text-white flex flex-col">
      <div class="px-5 py-6 flex items-center gap-3 border-b border-white/10">
        <img src="IMG/logo.png" alt="Bonanza Tecpán" class="w-10 h-10 rounded-full object-contain bg-white/10 p-1">
        <div>
          <p class="text-lg font-semibold leading-none">Bonanza</p>
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

        <a href="login.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
          <!-- icono inventario -->
          <img src="IMG/icono_CerrarSesion.png" alt="iconoInventario" class="w-6 h-6 shrink-0">
          <span><b>Cerrar Sesion</b></span>
        </a>
      
      <div class="mt-auto p-4 text-xs text-white/70 border-t border-white/10 text-center">
        © <?php /* si no usas PHP, borra esta línea y pon el año fijo */ echo date('Y'); ?> Bonanza Tecpán
      </div>
    </aside>

    <!-- Contenido principal -->
    <main class="flex-1 p-6">
      <header class="mb-6">
        <h1 class="text-2xl font-bold text-center">
          Bienvenido a <span class="text-[#F2992E]">Bonanza</span>
        </h1>
      </header>

      <!-- Coloca aquí tus tarjetas o secciones -->
      <section class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        <a href="#" class="rounded-lg border bg-white p-5 shadow-sm hover:shadow transition">
          <h2 class="font-semibold">Accion 1</h2>
          <p class="text-sm text-gray-600">Subtitulo Accion 1</p>
        </a>

        <a href="#" class="rounded-lg border bg-white p-5 shadow-sm hover:shadow transition">
          <h2 class="font-semibold">Accion 2</h2>
          <p class="text-sm text-gray-600">Subtitulo Accion 2</p>
        </a>

        <a href="#" class="rounded-lg border bg-white p-5 shadow-sm hover:shadow transition">
          <h2 class="font-semibold">Accion 3</h2>
          <p class="text-sm text-gray-600">Subtitulo Accion 3</p>
        </a>
      </section>
    </main>
  </div>

</body>
</html>
