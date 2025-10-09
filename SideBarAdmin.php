<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#4E2A1A] text-white flex flex-col">
            <div class="px-5 py-6 flex items-center gap-3 border-b border-white/10">
                <img src="IMG/logo.png" alt="Bonanza Tecpán" class="w-10 h-10 rounded-full object-contain bg-white/10 p-1">
                <div>
                    <p class="text-lg font-semibold leading-none">
                        <a href="Principal.php">Bonanza</a>
                    </p>
                </div>
            </div>

            <nav class="p-3 space-y-1">
                <a href="Pedidos.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
                    <img src="IMG/icono_Pedidos.png" alt="iconoPedidos" class="w-6 h-6 shrink-0">
                    <span>Pedidos</span>
                </a>

                <a href="Reservas.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
                    <img src="IMG/icono_Reservacion.png" alt="iconoReservas" class="w-6 h-6 shrink-0">
                    <span>Reservas</span>
                </a>

                <a href="Carta_Platillo.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
                    <img src="IMG/icono_Carta_Platillo.png" alt="iconoCarta_Platillo" class="w-6 h-6 shrink-0">
                    <span>Carta / Platillo</span>
                </a>

                <a href="Inventario.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
                    <img src="IMG/icono_Inventario.png" alt="iconoInventario" class="w-6 h-6 shrink-0">
                    <span>Inventario</span>
                </a>

                <a href="Cliente.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
                    <img src="IMG/icono_Cliente.png" alt="iconoCliente" class="w-6 h-6 shrink-0">
                    <span>Clientes</span>
                </a>

                <a href="Empleados.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
                    <img src="IMG/icono_Empleados.png" alt="iconoEmpleados" class="w-6 h-6 shrink-0">
                    <span>Empleados</span>
                </a>

                <a href="Caja.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
                    <img src="IMG/icono_Caja.png" alt="iconoCaja" class="w-6 h-6 shrink-0">
                    <span>Caja</span>
                </a>

                <a href="Reportes_Auditoria.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
                    <img src="IMG/icono_Reportes_Auditoria.png" alt="iconoReportes_Auditoria" class="w-6 h-6 shrink-0">
                    <span>Reportes y Auditoría</span>
                </a>
            </nav>

            <a href="LogInEmpleados.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition">
                <img src="IMG/icono_CerrarSesion.png" alt="iconoCerrarSesion" class="w-6 h-6 shrink-0">
                <span><b>Cerrar Sesión</b></span>
            </a>

            <div class="mt-auto p-4 text-xs text-white/70 border-t border-white/10 text-center">
                © <?php echo date('Y'); ?> Bonanza Tecpán
            </div>
        </aside>

</body>
</html>
