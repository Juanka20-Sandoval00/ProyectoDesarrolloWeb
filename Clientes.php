<?php
// Ejemplo de datos simulados — en producción vendrán de la BD
$clientes = [
    [
        "id" => "C001",
        "nombre" => "Juan Pérez",
        "telefono" => "5555-1234",
        "correo" => "juan.perez@example.com",
        "visitas" => 12,
        "ultima" => "2025-10-20",
        "estado" => "Activo"
    ],
    [
        "id" => "C002",
        "nombre" => "María López",
        "telefono" => "5555-5678",
        "correo" => "maria.lopez@example.com",
        "visitas" => 5,
        "ultima" => "2025-10-27",
        "estado" => "Activo"
    ],
    [
        "id" => "C003",
        "nombre" => "Carlos Gómez",
        "telefono" => "5555-9988",
        "correo" => "c.gomez@example.com",
        "visitas" => 2,
        "ultima" => "2025-10-15",
        "estado" => "Bloqueado"
    ],
];

?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Bonanza Tecpán — Clientes</title>

  <!-- estilos (puedes usar el mismo style_pedidos.css si quieres unificar) -->
  <link rel="stylesheet" href="./CSS/style_clientes.css">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="layout">

  <!-- ========== SIDEBAR ========== -->
  <aside class="sidebar">
    <!-- Marca -->
    <div class="brand">
      <div class="brand-logo">
        <img src="IMG/logo.png"
             alt="Bonanza"
             style="width:42px;height:42px;object-fit:cover;border-radius:10px;">
      </div>
      <div class="brand-title">
        <strong>Bonanza</strong>
        <small>Tecpán</small>
      </div>
    </div>

    <!-- Menú -->
    <nav class="menu">
      <a href="Pedidos.php" class="menu-item">
        <img src="IMG/icono_Pedidos.png" class="icon" alt="Pedidos" />
        <span>Pedidos</span>
      </a>

      <a href="Reservas.php" class="menu-item">
        <img src="IMG/icono_Reservacion.png" class="icon" alt="Reservas" />
        <span>Reservas</span>
      </a>

      <a href="Carta_Platillo.php" class="menu-item">
        <img src="IMG/icono_Carta_Platillo.png" class="icon" alt="Carta / Platillo" />
        <span>Carta / Platillo</span>
      </a>

      <a href="Inventario.php" class="menu-item">
        <img src="IMG/icono_Inventario.png" class="icon" alt="Inventario" />
        <span>Inventario</span>
      </a>

      <a href="Cliente.php" class="menu-item active">
        <img src="IMG/icono_Cliente.png" class="icon" alt="Clientes" />
        <span>Clientes</span>
      </a>

      <a href="Caja.php" class="menu-item">
        <img src="IMG/icono_Caja.png" class="icon" alt="Caja" />
        <span>Caja</span>
      </a>
    </nav>

    <!-- Logout -->
    <a href="LogInEmpleados.php" class="menu-item logout-link">
      <img src="IMG/icono_CerrarSesion.png" class="icon" alt="Cerrar Sesión" />
      <span><b>Cerrar Sesión</b></span>
    </a>
  </aside>
  <!-- ========== FIN SIDEBAR ========== -->


  <!-- ========== CONTENIDO PRINCIPAL ========== -->
  <main class="main">

    <!-- Header -->
    <header class="top-header">
      <div class="header-info">
        <h1 class="page-title">Gestión de Clientes</h1>

        <p class="page-sub">
          Administra la información de tus clientes frecuentes,
          historial de visitas y estado actual.
        </p>

        <div class="status-inline">
          <span class="badge-online-inline"></span>
          <span class="status-text-inline">Base de Datos Activa</span>
        </div>
      </div>

      <div class="header-meta">
        <div class="date-today">
          <?php echo date("d \\d\\e F, Y"); ?>
        </div>
        <div class="time-now" id="horaActual"><?php echo date("H:i:s"); ?></div>
      </div>
    </header>


    <!-- Acciones principales -->
    <section class="card card-inline-actions">
      <div class="acciones-row">
        <button class="btn-primary" id="btnNuevoCliente">
          <span class="btn-icon">＋</span>
          <span>Nuevo Cliente</span>
        </button>

        <div class="acciones-right">
          <button class="btn-line">Exportar CSV</button>
          <button class="btn-line">Exportar PDF</button>
        </div>
      </div>
    </section>


    <!-- Filtros / búsqueda -->
    <section class="card">
      <div class="filters-row">
        <label class="filter-field">
          <span class="filter-label">Estado</span>
          <select>
            <option>Todos</option>
            <option>Activo</option>
            <option>Bloqueado</option>
          </select>
        </label>

        <label class="filter-field">
          <span class="filter-label">Mínimo de visitas</span>
          <select>
            <option>0+</option>
            <option>5+</option>
            <option>10+</option>
          </select>
        </label>

        <label class="filter-field search-field">
          <span class="filter-label">Búsqueda</span>
          <div class="search-wrap">
            <span class="search-icon">🔍</span>
            <input type="text" placeholder="Nombre, teléfono, correo...">
          </div>
        </label>
      </div>
    </section>


    <!-- Tabla clientes -->
    <section class="card stretch">
      <div class="card-header between">
        <h2 class="card-title">Clientes Registrados</h2>
        <div class="row-gap-8">
          <button class="btn-line">Filtrar avanzando</button>
          <button class="btn-line">Refrescar</button>
        </div>
      </div>

      <div class="tabla-wrap">
        <table class="tabla-clientes">
          <thead>
            <tr>
              <th>#</th>
              <th>Cliente</th>
              <th>Teléfono</th>
              <th>Correo</th>
              <th>Visitas</th>
              <th>Última visita</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tbody>
          <?php foreach ($clientes as $cli): ?>
            <tr class="fila-cliente" data-id="<?php echo $cli['id']; ?>">
              <td><?php echo $cli['id']; ?></td>
              <td class="cliente-nombre"><?php echo $cli['nombre']; ?></td>
              <td><?php echo $cli['telefono']; ?></td>
              <td><?php echo $cli['correo']; ?></td>
              <td><?php echo $cli['visitas']; ?></td>
              <td>
                <div class="fecha-visita"><?php echo $cli['ultima']; ?></div>
              </td>
              <td>
                <?php if ($cli['estado']=="Activo"): ?>
                  <span class="badge badge-activo">Activo</span>
                <?php else: ?>
                  <span class="badge badge-bloqueado">Bloqueado</span>
                <?php endif; ?>
              </td>
              <td class="acciones-cell">
                <button class="btn-mini gray">👁 Ver</button>
                <button class="btn-mini yellow">✎ Editar</button>
                <button class="btn-mini red">⛔ Bloquear</button>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>


    <!-- Detalle cliente seleccionado -->
    <section class="card stretch" id="detalleClienteCard">
      <div class="detalle-placeholder" id="detalleVacio">
        <div class="icono-detalle">🧍</div>
        <h2>Selecciona un Cliente</h2>
        <p>Haz clic en cualquier cliente de la tabla para ver más información.</p>
      </div>

      <div class="detalle-content hidden" id="detalleLleno">
        <div class="detalle-head">
          <div>
            <div class="detalle-id">Cliente <span id="detId"></span></div>
            <div class="detalle-nombre" id="detNombre"></div>
          </div>
        </div>

        <div class="detalle-info">
          <div><strong>Teléfono:</strong> <span id="detTelefono"></span></div>
          <div><strong>Correo:</strong> <span id="detCorreo"></span></div>
          <div><strong>Visitas:</strong> <span id="detVisitas"></span></div>
          <div><strong>Última visita:</strong> <span id="detUltima"></span></div>
          <div><strong>Estado:</strong> <span id="detEstado"></span></div>
        </div>

        <div class="detalle-actions">
          <button class="btn-mini yellow">✎ Editar Cliente</button>
          <button class="btn-mini red">⛔ Bloquear</button>
        </div>
      </div>
    </section>

  </main>
  <!-- ========== FIN CONTENIDO PRINCIPAL ========== -->

</div>

<script>
// Reloj vivo
setInterval(() => {
  const el = document.getElementById("horaActual");
  if (!el) return;
  const now  = new Date();
  const hh   = String(now.getHours()).padStart(2,"0");
  const mm   = String(now.getMinutes()).padStart(2,"0");
  const ss   = String(now.getSeconds()).padStart(2,"0");
  el.textContent = hh+":"+mm+":"+ss;
}, 1000);

// Datos dinámicos del detalle
const filas = document.querySelectorAll(".fila-cliente");

const detVacio    = document.getElementById("detalleVacio");
const detLleno    = document.getElementById("detalleLleno");

const detId       = document.getElementById("detId");
const detNombre   = document.getElementById("detNombre");
const detTelefono = document.getElementById("detTelefono");
const detCorreo   = document.getElementById("detCorreo");
const detVisitas  = document.getElementById("detVisitas");
const detUltima   = document.getElementById("detUltima");
const detEstado   = document.getElementById("detEstado");

filas.forEach(fila => {
  fila.addEventListener("click", () => {
    const cols = fila.children;
    detId.textContent       = cols[0].textContent.trim();         // id
    detNombre.textContent   = cols[1].textContent.trim();         // nombre
    detTelefono.textContent = cols[2].textContent.trim();         // tel
    detCorreo.textContent   = cols[3].textContent.trim();         // correo
    detVisitas.textContent  = cols[4].textContent.trim();         // visitas
    detUltima.textContent   = cols[5].textContent.trim();         // ultima
    detEstado.textContent   = cols[6].innerText.trim();           // estado badge texto

    detVacio.classList.add("hidden");
    detLleno.classList.remove("hidden");
    // podrías scrollear al detalle si quieres
    // document.getElementById("detalleClienteCard").scrollIntoView({behavior:'smooth'});
  });
});

const btnNuevoCliente = document.getElementById("btnNuevoCliente");
if (btnNuevoCliente) {
  btnNuevoCliente.addEventListener("click", () => {
    // más adelante esto puede ser un modal o redirección
    alert("Aquí iría el formulario para registrar un nuevo cliente 👤");
  });
}
</script>

</body>
</html>
