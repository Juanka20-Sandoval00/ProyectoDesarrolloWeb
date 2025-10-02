<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

        <a href="entregas_domicilio.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
          <!-- icono órdenes -->
          <img src="IMG/icono_entregas_domicilio.png" alt="iconoÓrdenes" class="w-6 h-6 shrink-0">
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
</body>
</html>