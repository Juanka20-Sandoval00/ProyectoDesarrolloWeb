// ----------------------
// utilidades de storage
// ----------------------
function cargarReservas() {
  // lee el array guardado en localStorage
  const data = localStorage.getItem('reservas');
  return data ? JSON.parse(data) : [];
}

function guardarReservas(reservas) {
  // guarda el array (como texto JSON)
  localStorage.setItem('reservas', JSON.stringify(reservas));
}

// ----------------------
// render de la tabla
// ----------------------
function renderTabla() {
  const tbody = document.getElementById('tbodyReservas');
  const reservas = cargarReservas();

  // limpiamos la tabla
  tbody.innerHTML = '';

  // volvemos a dibujar fila por fila
  reservas.forEach((reserva, index) => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${reserva.fecha}</td>
      <td>${reserva.hora}</td>
      <td>${reserva.nombre}</td>
      <td>${reserva.dpi}</td>
      <td>${reserva.mesa}</td>
      <td>${reserva.personas}</td>
      <td><button class="btn btn-warning btn-editar" data-index="${index}">Editar</button></td>
      <td><button class="btn btn-danger btn-borrar" data-index="${index}">Borrar</button></td>
    `;
    tbody.appendChild(tr);
  });
}

// ----------------------
// limpiar formulario
// ----------------------
function limpiarForm() {
  const frm = document.getElementById('frmReserva');
  frm.reset();
  document.getElementById('personas').value = 2;
  // quitamos modo edición
  editIndex = null;
  document.getElementById('btnGuardar').textContent = 'Guardar';
}

// ----------------------
// estado de edición
// ----------------------
let editIndex = null; // null = alta nueva, número = estamos editando esa fila

// ----------------------
// al cargar la página
// ----------------------
document.addEventListener('DOMContentLoaded', () => {
  renderTabla();
});

// ----------------------
// submit del formulario
// ----------------------
const frmReserva = document.getElementById('frmReserva');

frmReserva.addEventListener('submit', function (ev) {
  ev.preventDefault(); // no recargar

  const fecha     = document.getElementById('fecha').value;
  const hora      = document.getElementById('hora').value;
  const nombre    = document.getElementById('nombre').value.trim();
  const dpi       = document.getElementById('dpi').value.trim();
  const mesa      = document.getElementById('mesa').value;
  const personas  = document.getElementById('personas').value;

  if (!fecha || !hora || !nombre || !dpi || !mesa || !personas) {
    alert('Por favor llene todos los campos.');
    return;
  }

  const reservas = cargarReservas();

  // si estamos editando una fila existente, reemplazamos
  if (editIndex !== null) {
    reservas[editIndex] = { fecha, hora, nombre, dpi, mesa, personas };
  } else {
    // si es nueva, la agregamos al final
    reservas.push({ fecha, hora, nombre, dpi, mesa, personas });
  }

  // guardamos en localStorage
  guardarReservas(reservas);

  // refrescamos la tabla
  renderTabla();

  // limpiamos el form / salimos de modo edición
  limpiarForm();
});

// ----------------------
// click en editar / borrar con SweetAlert2
// ----------------------
const tbody = document.getElementById('tbodyReservas');

tbody.addEventListener('click', function (ev) {
  const target = ev.target;

  // BORRAR
  if (target.classList.contains('btn-borrar')) {
    const index = target.getAttribute('data-index');
    const reservas = cargarReservas();

    Swal.fire({
      title: '¿Eliminar reserva?',
      text: 'Esta acción no se puede deshacer.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#4E2A1A',
      cancelButtonColor: '#aaa',
      confirmButtonText: 'Sí, borrar',
      cancelButtonText: 'Cancelar',
      background: '#fff9f4',
    }).then((result) => {
      if (result.isConfirmed) {
        reservas.splice(index, 1);
        guardarReservas(reservas);
        renderTabla();

        Swal.fire({
          icon: 'success',
          title: 'Reserva eliminada',
          text: 'El registro fue borrado exitosamente.',
          confirmButtonColor: '#4E2A1A',
          background: '#fff9f4',
        });
      }
    });
  }

  // EDITAR
  if (target.classList.contains('btn-editar')) {
    const index = target.getAttribute('data-index');
    const reservas = cargarReservas();
    const r = reservas[index];

    document.getElementById('fecha').value     = r.fecha;
    document.getElementById('hora').value      = r.hora;
    document.getElementById('nombre').value    = r.nombre;
    document.getElementById('dpi').value       = r.dpi;
    document.getElementById('mesa').value      = r.mesa;
    document.getElementById('personas').value  = r.personas;

    editIndex = parseInt(index, 10);
    document.getElementById('btnGuardar').textContent = 'Actualizar';

    window.scrollTo({ top: 0, behavior: 'smooth' });
  }
});