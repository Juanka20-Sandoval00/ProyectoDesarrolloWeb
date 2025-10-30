<?php
require_once 'db.php';
session_start(); // importante antes de usar $_SESSION

// usuario logueado
$nombreUsuario = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : 'Usuario';

// ================= KPI: Ventas del mes =================
$sqlVentasMes = "
    SELECT IFNULL(SUM(Total_a_Pagar),0) AS ventas_mes
    FROM Factura_Orden_Mesa f
    JOIN Orden o ON o.ID_Orden = f.ID_Orden
    WHERE o.Estado='Pagada'
      AND MONTH(o.Fecha)=MONTH(CURDATE())
      AND YEAR(o.Fecha)=YEAR(CURDATE())
";
$resVentasMes = $conn->query($sqlVentasMes);
$rowVentasMes = $resVentasMes ? $resVentasMes->fetch_assoc() : null;
$ventasMesVal = $rowVentasMes ? floatval($rowVentasMes['ventas_mes']) : 0;

// ================= KPI: Ticket promedio =================
$sqlTicketProm = "
    SELECT 
        IFNULL(SUM(f.Total_a_Pagar) / NULLIF(COUNT(DISTINCT o.ID_Orden),0),0) AS ticket_promedio
    FROM Factura_Orden_Mesa f
    JOIN Orden o ON o.ID_Orden = f.ID_Orden
    WHERE o.Estado='Pagada'
      AND MONTH(o.Fecha)=MONTH(CURDATE())
      AND YEAR(o.Fecha)=YEAR(CURDATE())
";
$resTicketProm = $conn->query($sqlTicketProm);
$rowTicketProm = $resTicketProm ? $resTicketProm->fetch_assoc() : null;
$ticketPromVal = $rowTicketProm ? floatval($rowTicketProm['ticket_promedio']) : 0;

// ================= KPI: % Bajo stock =================
$sqlPctStock = " 
    SELECT 
        (SUM(CASE WHEN Stock_Actual < Stock_Minimo THEN 1 ELSE 0 END) 
         / NULLIF(COUNT(*),0)) * 100 AS pct_bajo_stock 
    FROM Inventario
";
$resPct = $conn->query($sqlPctStock);
$rowPct = $resPct ? $resPct->fetch_assoc() : null;
$pctBajoStockVal = $rowPct && $rowPct['pct_bajo_stock'] !== null
    ? floatval($rowPct['pct_bajo_stock'])
    : 0;

// ================= KPI: Sucursal top =================
// No hay ID_Sucursal en Orden todavía -> mostramos N/A
$sucursalTopVal = "N/A";

// ================= ALERTAS =================

// inventario crítico
$sqlInvCritico = "
    SELECT ing.Nombre AS NombreItem,
           i.Stock_Actual,
           i.Stock_Minimo
    FROM Inventario i
    JOIN Ingrediente ing ON ing.ID_Ingrediente = i.ID_Ingrediente
    WHERE i.Stock_Actual < i.Stock_Minimo
    ORDER BY (i.Stock_Actual - i.Stock_Minimo) ASC
    LIMIT 5
";
$invCriticoRes = $conn->query($sqlInvCritico);
$invCritico = [];
if ($invCriticoRes) {
    while ($row = $invCriticoRes->fetch_assoc()) {
        $invCritico[] = $row;
    }
}

// productos sin venta en 30 días
$sqlSinVenta = "
    SELECT p.Nombre AS NombreProducto
    FROM Producto p
    LEFT JOIN (
        SELECT dv.ID_Producto, MAX(v.Fecha) AS ultima_venta
        FROM Detalle_Venta dv
        JOIN Venta v ON v.ID_Venta = dv.ID_Venta
        GROUP BY dv.ID_Producto
    ) ult ON ult.ID_Producto = p.ID_Producto
    WHERE (ult.ultima_venta IS NULL 
        OR ult.ultima_venta < DATE_SUB(CURDATE(), INTERVAL 30 DAY))
    LIMIT 5
";
$sinVentaRes = $conn->query($sqlSinVenta);
$sinVenta = [];
if ($sinVentaRes) {
    while ($row = $sinVentaRes->fetch_assoc()) {
        $sinVenta[] = $row;
    }
}

// ================= CAJA DE AYER =================
$ayer = date('Y-m-d', strtotime('-1 day'));
$sqlCaja = "
    SELECT c.*, e.Nombre AS NombreEmpleado, e.Apellido AS ApellidoEmpleado
    FROM Caja c
    LEFT JOIN Empleado e ON e.ID_Empleado = c.Responsable
    WHERE c.Fecha = ?
    LIMIT 1
";
$stmtCaja = $conn->prepare($sqlCaja);
$stmtCaja->bind_param("s", $ayer);
$stmtCaja->execute();
$resultCaja = $stmtCaja->get_result();
$caja = $resultCaja ? $resultCaja->fetch_assoc() : null;
$stmtCaja->close();
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard Inteligencia de Negocio</title>
<meta name="theme-color" content="#4E2A1A"/>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Estilos propios Bonanza -->
<link rel="stylesheet" href="./CSS/style_principal.css">
</head>

<body class="app-body">

  <!-- SIDEBAR (ya integrado aquí, ahora usa la clase .sidebar-app que definimos en el CSS) -->
  <aside class="sidebar-app">
    <div class="px-5 py-6 flex items-center gap-3 border-b border-white/10">
      <img src="IMG/logo.png" alt="Bonanza Tecpán" class="w-10 h-10 rounded-full object-contain bg-white/10 p-1">
      <div>
        <p class="text-lg font-semibold leading-none">
          <a href="Principal.php" class="text-white no-underline">Bonanza</a>
        </p>
      </div>
    </div>

    <nav class="p-3 space-y-1 flex-1">
      <a href="Pedidos.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition text-white no-underline">
        <img src="IMG/icono_Pedidos.png" alt="iconoPedidos" class="w-6 h-6 shrink-0">
        <span>Pedidos</span>
      </a>

      <a href="Reservas.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition text-white no-underline">
        <img src="IMG/icono_Reservacion.png" alt="iconoReservas" class="w-6 h-6 shrink-0">
        <span>Reservas</span>
      </a>

      <a href="Carta_Platillo.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition text-white no-underline">
        <img src="IMG/icono_Carta_Platillo.png" alt="iconoCarta_Platillo" class="w-6 h-6 shrink-0">
        <span>Carta / Platillo</span>
      </a>

      <a href="Inventario.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition text-white no-underline">
        <img src="IMG/icono_Inventario.png" alt="iconoInventario" class="w-6 h-6 shrink-0">
        <span>Inventario</span>
      </a>

      <a href="Clientes.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition text-white no-underline">
        <img src="IMG/icono_Cliente.png" alt="iconoCliente" class="w-6 h-6 shrink-0">
        <span>Clientes</span>
      </a>

      <a href="Caja.php" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/10 transition text-white no-underline">
        <img src="IMG/icono_Caja.png" alt="iconoCaja" class="w-6 h-6 shrink-0">
        <span>Caja</span>
      </a>
    </nav>

    <a href="LogInEmpleados.php" class="flex items-center gap-3 px-3 py-3 rounded-md hover:bg-white/10 transition text-white no-underline border-t border-white/10">
      <img src="IMG/icono_CerrarSesion.png" alt="iconoCerrarSesion" class="w-6 h-6 shrink-0">
      <span><b>Cerrar Sesión</b></span>
    </a>
  </aside>
  <!-- FIN SIDEBAR -->

  <!-- CONTENIDO PRINCIPAL -->
  <main class="app-main">

    <!-- Encabezado -->
    <header class="mb-6 flex flex-wrap justify-center gap-4">
      <div>
        <h1 class="text-2xl font-bold text-[var(--bonanza-accent)]">Inteligencia de Negocio</h1>
        
      </div>

      
    </header>

    <!-- KPIs -->
    <section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">

      <div class="bonanza-card">
        <div class="bonanza-kpi-label">Ventas del mes</div>
        <div class="bonanza-kpi-value">
          Q <?php echo number_format($ventasMesVal,2); ?>
        </div>
      </div>

      <div class="bonanza-card">
        <div class="bonanza-kpi-label">Ticket promedio</div>
        <div class="bonanza-kpi-value">
          Q <?php echo number_format($ticketPromVal,2); ?>
        </div>
      </div>

      <div class="bonanza-card">
        <div class="bonanza-kpi-label">% Bajo stock</div>
        <div class="bonanza-kpi-value danger">
          <?php echo number_format($pctBajoStockVal,2); ?>%
        </div>
      </div>

      <div class="bonanza-card">
        <div class="bonanza-kpi-label">Sucursal destacada (mes)</div>
        <div class="bonanza-kpi-value big">
          <?php echo htmlspecialchars($sucursalTopVal); ?>
        </div>
      </div>

    </section>

    <!-- Gráficas -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

      <!-- Ventas últimos meses -->
      <div class="bonanza-card">
        <div class="bonanza-card-header">
          <h2 class="bonanza-card-title">Ventas por mes</h2>
          <span class="text-xs text-gray-500">Últimos 6 meses</span>
        </div>
        <canvas id="chartVentasMes" height="140"></canvas>
      </div>

      <!-- Top productos -->
      <div class="bonanza-card">
        <div class="bonanza-card-header">
          <h2 class="bonanza-card-title">Top 5 productos (este mes)</h2>
        </div>
        <canvas id="chartTopProductos" height="140"></canvas>
      </div>

      <!-- Ventas por sucursal -->
      <div class="bonanza-card lg:col-span-2">
        <div class="bonanza-card-header">
          <h2 class="bonanza-card-title">Ventas por sucursal (mes actual)</h2>
        </div>
        <canvas id="chartSucursal" height="140"></canvas>
      </div>

    </section>

    <!-- Alertas inteligentes -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

      <div class="bonanza-card">
        <h2 class="bonanza-card-title mb-2">Inventario crítico</h2>

        <?php if (count($invCritico) === 0): ?>
          <p class="text-sm text-gray-500 italic">No hay productos en nivel crítico 🎉</p>
        <?php else: ?>
          <ul class="text-sm text-gray-700 space-y-1">
          <?php foreach ($invCritico as $item): ?>
            <li class="flex justify-between">
              <span><?php echo htmlspecialchars($item['NombreItem']); ?></span>
              <span class="text-red-600 font-semibold">
                <?php echo intval($item['Stock_Actual']); ?>/<?php echo intval($item['Stock_Minimo']); ?>
              </span>
            </li>
          <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <p class="bonanza-hint">Notificar a compras si llega a 0.</p>
      </div>

      <div class="bonanza-card">
        <h2 class="bonanza-card-title mb-2">Sin venta en 30+ días</h2>

        <?php if (count($sinVenta) === 0): ?>
          <p class="text-sm text-gray-500 italic">Todos los productos tuvieron movimiento reciente.</p>
        <?php else: ?>
          <ul class="text-sm text-gray-700 list-disc pl-5 space-y-1">
          <?php foreach ($sinVenta as $row): ?>
            <li><?php echo htmlspecialchars($row['NombreProducto']); ?></li>
          <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <p class="bonanza-hint">Revisar si conviene promoción / liquidación.</p>
      </div>

    </section>

    <!-- Cierre de caja de ayer -->
    <section class="bonanza-card mb-8">
      <h2 class="bonanza-card-title mb-2">
        Cierre de caja del día anterior (<?php echo htmlspecialchars($ayer); ?>)
      </h2>

      <?php if ($caja): ?>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
          <div>
            <div class="text-gray-500">Monto Inicial</div>
            <div class="font-semibold">
              Q <?php echo number_format($caja['Monto_Inicial'],2); ?>
            </div>
          </div>
          <div>
            <div class="text-gray-500">Ingresos</div>
            <div class="font-semibold text-green-600">
              Q <?php echo number_format($caja['Ingresos'],2); ?>
            </div>
          </div>
          <div>
            <div class="text-gray-500">Egresos</div>
            <div class="font-semibold text-red-600">
              Q <?php echo number_format($caja['Egresos'],2); ?>
            </div>
          </div>
          <div>
            <div class="text-gray-500">Monto Final</div>
            <div class="font-semibold">
              Q <?php echo number_format($caja['Monto_Final'],2); ?>
            </div>
          </div>
        </div>

        <div class="text-xs text-gray-500 mt-3">
          Responsable:
          <?php echo htmlspecialchars($caja['NombreEmpleado'].' '.$caja['ApellidoEmpleado']); ?>
          | Sucursal: <?php echo htmlspecialchars($caja['ID_Sucursal']); ?>
        </div>
      <?php else: ?>
        <p class="text-sm text-gray-500 italic">No hay registro de caja para ayer.</p>
      <?php endif; ?>
    </section>

    <!-- Exportadores -->
    <section class="bonanza-card mb-16">
      <h2 class="bonanza-card-title mb-4">Reportes / Exportar</h2>

      <div class="flex flex-wrap gap-3 text-sm">
        <form action="export_ventas_mes_excel.php" method="GET">
          <button class="btn-bonanza-solid" type="submit">
            Ventas del mes (Excel)
          </button>
        </form>

        <form action="export_inventario_excel.php" method="GET">
          <button class="btn-bonanza-solid" type="submit">
            Inventario actual (Excel)
          </button>
        </form>

        <form action="export_clientes_proveedores_excel.php" method="GET">
          <button class="btn-bonanza-solid" type="submit">
            Clientes / Proveedores (Excel)
          </button>
        </form>

        <form action="export_ventas_mes_pdf.php" method="GET">
          <button class="btn-bonanza-ghost" type="submit">
            Ventas del mes (PDF)
          </button>
        </form>
      </div>

     
    </section>

  </main>

  <!-- Scripts para gráficas -->
  <script>
  async function cargarBI() {
    try {
      const [ventasMes, topProd, sucursal] = await Promise.all([
        fetch('bi_ventasMes.php').then(r=>r.json()),
        fetch('bi_topProductos.php').then(r=>r.json()),
        fetch('bi_ventasSucursal.php').then(r=>r.json()),
      ]);

      // Chart ventas por mes
      const ctx1 = document.getElementById('chartVentasMes').getContext('2d');
      new Chart(ctx1, {
        type: 'line',
        data: {
          labels: ventasMes.labels,
          datasets: [{
            label: 'Q Vendido',
            data: ventasMes.data,
            fill: true
          }]
        }
      });

      // Chart top productos
      const ctx2 = document.getElementById('chartTopProductos').getContext('2d');
      new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: topProd.labels,
          datasets: [{
            label: 'Cantidad vendida',
            data: topProd.data
          }]
        },
        options: {
          indexAxis: 'y'
        }
      });

      // Chart ventas por sucursal
      const ctx3 = document.getElementById('chartSucursal').getContext('2d');
      new Chart(ctx3, {
        type: 'bar',
        data: {
          labels: sucursal.labels,
          datasets: [{
            label: 'Ventas (Q)',
            data: sucursal.data
          }]
        }
      });
    } catch (e) {
      console.warn('Error cargando BI (pendiente endpoints JSON):', e);
    }
  }
  cargarBI();
  </script>

</body>
</html>
