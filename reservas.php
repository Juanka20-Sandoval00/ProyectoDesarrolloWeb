<?php include 'SideBarEmpleado.php'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reservas</title>
  <link rel="stylesheet" href="CSS/styles.css">
  <link rel="stylesheet" href="CSS/stylereservas.css">
  <meta name="theme-color" content="#4E2A1A"/>
</head>
<body>
  <!-- ==================== Reservas ==================== -->
<main class="container section">
  <!-- Formulario -->
  <h2>Hacer Reservas</h2>
  <div class="card p">

    <!-- Fecha y Hora -->
    <div class="p" style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
      <label>Fecha<br/>
        <input type="date" required>
      </label>
      <label>Hora<br/>
        <input type="time" required>
      </label>
    </div>

    <!-- Nombre y DPI -->
    <div class="p" style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
      <label>Nombre<br/>
        <input type="text" placeholder="Cliente" required>
      </label>
      <label>DPI<br/>
        <input type="number" placeholder="Número de DPI" required>
      </label>
    </div>

    <!-- Mesa y Personas -->
    <div class="p" style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
      <label>Mesa<br/>
        <input type="number" min="1" placeholder="N° Mesa" required>
      </label>
      <label>Personas<br/>
        <input type="number" min="1" value="2" required>
      </label>
    </div>

    <!-- Botones -->
    <div class="p" style="display:flex; gap: 12px;">
      <button class="btn btn-primary">Guardar</button>
      <button class="btn btn-ghost" type="reset">Limpiar</button>
    </div>
  </div>

  <!-- Tabla de Reservaciones -->
  <h2 style="margin-top:30px;">Reservaciones Hechas</h2>
  <div class="card p">
    <table class="tabla-reservas">
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
      <tbody>
        <tr>  
          <td>2025-09-25</td>
          <td>12:00</td>
          <td>Carlos López</td>
          <td>1234567890101</td>
          <td>5</td>
          <td>4</td>
          <td><button class="btn btn-warning">Editar</button></td>
          <td><button class="btn btn-danger">Borrar</button></td>
        </tr>
        <tr>
          <td>2025-09-25</td>
          <td>14:00</td>
          <td>Ana Pérez</td>
          <td>9876543210101</td>
          <td>2</td>
          <td>2</td>
          <td><button class="btn btn-warning">Editar</button></td>
          <td><button class="btn btn-danger">Borrar</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</main>
</body>
</html>
