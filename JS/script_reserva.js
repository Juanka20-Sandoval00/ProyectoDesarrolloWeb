document.addEventListener('DOMContentLoaded', () => {

    // ===============================
    // util: cargar / guardar en localStorage
    // ===============================
    function cargarReservas() {
        const data = localStorage.getItem('reservasBonanza');
        return data ? JSON.parse(data) : [];
    }

    function guardarReservas(arr) {
        localStorage.setItem('reservasBonanza', JSON.stringify(arr));
    }

    // ===============================
    // estado en memoria
    // ===============================
    let reservas = cargarReservas(); // [{fecha,hora,nombre,dpi,mesa,personas}, ...]

    // ===============================
    // refs DOM
    // ===============================
    const frmReserva   = document.getElementById('frmReserva');
    const fechaInput   = document.getElementById('fecha');
    const horaInput    = document.getElementById('hora');
    const nombreInput  = document.getElementById('nombre');
    const dpiInput     = document.getElementById('dpi');
    const mesaInput    = document.getElementById('mesa');
    const persInput    = document.getElementById('personas');
    const editIndexInp = document.getElementById('editIndex');

    const tbody        = document.getElementById('tbodyReservas');
    const btnLimpiar   = document.getElementById('btnLimpiar');

    // safety check: si no existe el formulario, no sigas
    if (!frmReserva || !tbody) {
        console.error("No se encontró frmReserva o tbodyReservas en el DOM. Revisa el include/estructura HTML.");
        return;
    }

    // ===============================
    // render de la tabla
    // ===============================
    function renderTabla() {
        tbody.innerHTML = '';

        reservas.forEach((reserva, index) => {
            const tr = document.createElement('tr');

            tr.innerHTML = `
                <td>${reserva.fecha}</td>
                <td>${reserva.hora}</td>
                <td>${reserva.nombre}</td>
                <td>${reserva.dpi}</td>
                <td>${reserva.mesa}</td>
                <td>${reserva.personas}</td>
                <td>
                    <button class="btn btn-ghost btn-editar" data-index="${index}">
                        ✏ Editar
                    </button>
                </td>
                <td>
                    <button class="btn btn-primary btn-borrar" data-index="${index}">
                        🗑 Borrar
                    </button>
                </td>
            `;

            tbody.appendChild(tr);
        });

        document.querySelectorAll('.btn-editar').forEach(btn => {
            btn.addEventListener('click', onEditarClick);
        });

        document.querySelectorAll('.btn-borrar').forEach(btn => {
            btn.addEventListener('click', onBorrarClick);
        });
    }

    // ===============================
    // limpiar formulario
    // ===============================
    function limpiarFormulario() {
        frmReserva.reset();
        editIndexInp.value = "";
        if (!persInput.value || persInput.value === "0") {
            persInput.value = "2";
        }
    }

    // ===============================
    // al presionar "Editar"
    // ===============================
    function onEditarClick(e) {
        const idx = e.currentTarget.getAttribute('data-index');
        const r = reservas[idx];

        fechaInput.value  = r.fecha;
        horaInput.value   = r.hora;
        nombreInput.value = r.nombre;
        dpiInput.value    = r.dpi;
        mesaInput.value   = r.mesa;
        persInput.value   = r.personas;

        editIndexInp.value = idx;

        Swal.fire({
            icon: 'info',
            title: 'Editando reserva',
            text: 'Modifica los datos y presiona "Guardar".',
            timer: 1800,
            showConfirmButton: false
        });
    }

    // ===============================
    // al presionar "Borrar"
    // ===============================
    function onBorrarClick(e) {
        const idx = e.currentTarget.getAttribute('data-index');
        const r = reservas[idx];

        Swal.fire({
            title: `¿Borrar la reserva de ${r.nombre}?`,
            text: `Mesa ${r.mesa} a las ${r.hora}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, borrar',
            cancelButtonText: 'Cancelar'
        }).then(result => {
            if (result.isConfirmed) {
                reservas.splice(idx, 1);
                guardarReservas(reservas);
                renderTabla();

                if (editIndexInp.value === idx) {
                    limpiarFormulario();
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Eliminado',
                    timer: 1300,
                    showConfirmButton: false
                });
            }
        });
    }

    // ===============================
    // submit del formulario (Guardar)
    // ===============================
    frmReserva.addEventListener('submit', function(e) {
        e.preventDefault(); // evita que se mande GET y recargue

        const nuevaReserva = {
            fecha: fechaInput.value.trim(),
            hora: horaInput.value.trim(),
            nombre: nombreInput.value.trim(),
            dpi: dpiInput.value.trim(),
            mesa: mesaInput.value.trim(),
            personas: persInput.value.trim()
        };

        if (
            !nuevaReserva.fecha ||
            !nuevaReserva.hora ||
            !nuevaReserva.nombre ||
            !nuevaReserva.dpi ||
            !nuevaReserva.mesa ||
            !nuevaReserva.personas
        ) {
            Swal.fire({
                icon: 'error',
                title: 'Campos incompletos',
                text: 'Llena todos los campos antes de guardar.'
            });
            return;
        }

        const editIdx = editIndexInp.value;

        if (editIdx === "" || editIdx === null) {
            // NUEVA
            reservas.push(nuevaReserva);

            Swal.fire({
                icon: 'success',
                title: 'Reserva guardada',
                text: 'Se agregó correctamente.',
                timer: 1500,
                showConfirmButton: false
            });

        } else {
            // EDITANDO
            reservas[editIdx] = nuevaReserva;

            Swal.fire({
                icon: 'success',
                title: 'Reserva actualizada',
                text: 'Los datos fueron modificados.',
                timer: 1500,
                showConfirmButton: false
            });
        }

        guardarReservas(reservas);
        renderTabla();
        limpiarFormulario();
    });

    // ===============================
    // botón "Limpiar"
    // ===============================
    if (btnLimpiar) {
        btnLimpiar.addEventListener('click', function() {
            limpiarFormulario();
        });
    }

    // ===============================
    // inicio
    // ===============================
    renderTabla();
    limpiarFormulario();

}); // <- fin DOMContentLoaded
