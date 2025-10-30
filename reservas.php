<?php include 'SideBarEmpleado.php'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reservas</title>

  <!-- Tailwind solo si lo usas para el sidebar -->
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="stylesheet" href="CSS/stylereservas.css?v=3">
  <meta name="theme-color" content="#4E2A1A"/>

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

<div class="flex min-h-screen">
  <!-- SIDEBAR viene de SideBarEmpleado.php -->

  <!-- CONTENIDO PRINCIPAL -->
  <main class="flex-1 container section">

    <!-- ====== Hacer Reservas ====== -->
    <h2>Hacer Reservas</h2>

    <div class="card p">
      <!-- Formulario -->
      <form id="frmReserva">
        <!-- Fecha y Hora -->
        <div class="p" style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
          <label>Fecha<br/>
            <input type="date" id="fecha" name="fecha" required>
          </label>

          <label>Hora<br/>
            <input type="time" id="hora" name="hora" required>
          </label>
        </div>

        <!-- Nombre y DPI -->
        <div class="p" style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
          <label>Nombre<br/>
            <input type="text" id="nombre" name="nombre" placeholder="Cliente" required>
          </label>

          <label>DPI<br/>
            <input type="number" id="dpi" name="dpi" placeholder="Número de DPI" required>
          </label>
        </div>

        <!-- Mesa y Personas -->
        <div class="p" style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
          <label>Mesa<br/>
            <input type="number" id="mesa" name="mesa" min="1" placeholder="N° Mesa" required>
          </label>

          <label>Personas<br/>
            <input type="number" id="personas" name="personas" min="1" value="2" required>
          </label>
        </div>

        <!-- Campo oculto para saber si estoy editando -->
        <input type="hidden" id="editIndex" value="">

        <!-- Botones -->
        <div class="p" style="display:flex; gap: 12px;">
          <button class="btn btn-primary" type="submit" id="btnGuardar">Guardar</button>
          <button class="btn btn-ghost" type="reset" id="btnLimpiar">Limpiar</button>
        </div>
      </form>
    </div>

    <!-- ====== Tabla de Reservaciones ====== -->
    <h2 style="margin-top:30px;">Reservaciones</h2>

    <div class="card p">
      <table class="tabla-reservas" style="width:95%; margin:0 auto;">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Nombre</th>
            <th>DPI</th>
            <th>Mesa</th>
            <th>Personas</th>
            <th>Editar</th>
            <th>Borrar</th>
          </tr>
        </thead>

        <tbody id="tbodyReservas">
          <!-- El JS va a inyectar aquí las filas -->
        </tbody>
      </table>
    </div>

  </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="JS/script_reserva.js"></script>
</body>
</html>

