<?php
// ===================== DATOS SIMULADOS =====================
// (esto luego vendrá de la BD)
$pedidosActivos = [
    [
        "id" => "001",
        "mesa" => "Mesa 1",
        "articulos" => "Paella Valenciana x2, Sangría x2",
        "estado" => "En preparación",
        "hora" => "15:23",
        "tiempo" => "hace 8 min",
        "mesero" => "Ana García",
        "total" => "Q356.00"
    ],
    [
        "id" => "003",
        "mesa" => "Mesa 3",
        "articulos" => "Tapas Variadas, Cerveza x4, Vino x2",
        "estado" => "Listo",
        "hora" => "15:35",
        "tiempo" => "hace 2 min",
        "mesero" => "Luis Rodríguez",
        "total" => "Q298.50"
    ],
    [
        "id" => "006",
        "mesa" => "Mesa 6",
        "articulos" => "Gazpacho x2, Pan con tomate",
        "estado" => "Pendiente",
        "hora" => "15:40",
        "tiempo" => "recién creado",
        "mesero" => "María López",
        "total" => "Q128.20"
    ],
];
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>Bonanza Tecpán — Gestión de Pedidos</title>

    <!-- tu CSS -->
    <link rel="stylesheet" href="./CSS/style_Pedidos.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fuente -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&display=swap"
        rel="stylesheet">
</head>
<body>
<div class="layout">
    <!-- ========== BARRA LATERAL ========== -->
    <aside class="sidebar">
        <!-- Encabezado / Marca -->
        <div class="brand">
            <div class="brand-logo">
                <img src="IMG/logo.png" alt="Bonanza Tecpán"
                    style="width:42px;height:42px;border-radius:9999px;object-fit:contain;
                           background-color:rgba(255, 255, 255, 1);padding:4px;">
            </div>
            <div class="brand-title">
                <strong>Bonanza</strong>
                <small>Tecpán</small>
            </div>
        </div>

        <!-- Menú -->
        <nav class="menu">
            <a href="Pedidos.php" class="menu-item active">
                <img src="IMG/icono_Pedidos.png" style="width:24px;height:24px;" alt="Pedidos">
                <span>Pedidos</span>
            </a>
            <a href="Reservas.php" class="menu-item">
                <img src="IMG/icono_Reservacion.png" style="width:24px;height:24px;" alt="Reservas">
                <span>Reservas</span>
            </a>
            <a href="Carta_Platillo.php" class="menu-item">
                <img src="IMG/icono_Carta_Platillo.png" style="width:24px;height:24px;" alt="Carta / Platillo">
                <span>Carta / Platillo</span>
            </a>
            <a href="Inventario.php" class="menu-item">
                <img src="IMG/icono_Inventario.png" style="width:24px;height:24px;" alt="Inventario">
                <span>Inventario</span>
            </a>
            <a href="Cliente.php" class="menu-item">
                <img src="IMG/icono_Cliente.png" style="width:24px;height:24px;" alt="Clientes">
                <span>Clientes</span>
            </a>
            <a href="Caja.php" class="menu-item">
                <img src="IMG/icono_Caja.png" style="width:24px;height:24px;" alt="Caja">
                <span>Caja</span>
            </a>

            <!-- Cerrar sesión -->
            <a href="LogInEmpleados.php" class="menu-item">
                <img src="IMG/icono_CerrarSesion.png" style="width:24px;height:24px;" alt="Cerrar Sesión">
                <span>Cerrar Sesión</span>
            </a>
        </nav>
    </aside>
    <!-- ========== FIN BARRA LATERAL ========== -->

    <!-- ================================================================== -->
    <!-- COLUMNA DERECHA PRINCIPAL (MAIN DEL DASHBOARD DE PEDIDOS) -->
    <!-- ================================================================== -->
    <main class="main">
        <!-- ======= HEADER SUPERIOR ======= -->
        <header class="top-header">
            <!-- Columna izquierda del header -->
            <div class="header-info">
                <h1 class="page-title">Sistema de Gestión de Pedidos</h1>
                <p class="page-sub">
                    Gestiona todos los pedidos del restaurante en tiempo real
                </p>

                <div class="status-inline">
                    <span class="badge-online-inline"></span>
                    <span class="status-text-inline">Sistema Activo</span>
                </div>
            </div>

            <!-- Columna derecha del header -->
            <div class="header-meta">
                <div class="date-today">
                    <?php echo date("d \\d\\e F, Y"); ?>
                </div>
                <div class="time-now" id="horaActual"><?php echo date("H:i:s"); ?></div>
            </div>
        </header>

        <section class="content-grid">
            <!-- BLOQUE MESAS -->
            <section class="left-col card-group">
                <!-- Tarjeta con grid de mesas -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Distribución de Mesas</h2>
                        <div class="legend">
                            <span><span class="dot dot-disponible"></span>Disponible</span>
                            <span><span class="dot dot-ocupada"></span>Ocupada</span>
                            <span><span class="dot dot-reservada"></span>Reservada</span>
                        </div>
                    </div>

                    <div class="mesas-grid" id="mesasGrid">
                        <?php for ($i=1; $i<=20; $i++): ?>
                            <button
                                class="mesa-card disponible"
                                data-mesa="<?php echo $i;?>"
                                data-personas="<?php echo rand(2,6);?>"
                                data-estado="Disponible"
                            >
                                <div class="mesa-info">
                                    <div class="mesa-nombre">Mesa <?php echo $i;?></div>
                                    <div class="mesa-personas"><?php echo rand(2,6);?> personas</div>
                                    <div class="mesa-estado-text">Disponible</div>
                                    <div class="mesa-pedido-id">
                                        Pedido #<?php echo str_pad($i,3,"0",STR_PAD_LEFT);?>
                                    </div>
                                </div>
                            </button>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- Acciones rápidas -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Acciones Rápidas</h2>
                    </div>

                    <div class="acciones-stack">
                        <!-- BOTÓN NUEVO: Agregar Mesa -->
                        <button class="btn btn-nuevo" id="btnAgregarMesa">
                            <span class="icon">＋</span>
                            Agregar Mesa
                        </button>

                        <!-- NOTA: ya no mostramos "Imprimir Tickets" ni "Nuevo Pedido" -->
                    </div>
                </div>
            </section>

            <!-- BLOQUE PEDIDOS ACTIVOS -->
            <section class="center-col">
                <div class="card stretch">
                    <div class="card-header between">
                        <div>
                            <h2 class="card-title">Pedidos Activos</h2>
                        </div>

                        <div class="row-gap-8">
                            <button class="btn-line" id="btnFiltros">⚙ Filtros</button>
                            <button class="btn-line" id="btnExportar">⬇ Exportar</button>
                        </div>
                    </div>

                    <!-- Filtros -->
                    <div class="filters-row">
                        <label class="filter-field">
                            <span class="filter-label">Estado</span>
                            <select>
                                <option>Todos los estados</option>
                                <option>Pendiente</option>
                                <option>En preparación</option>
                                <option>Listo</option>
                            </select>
                        </label>

                        <label class="filter-field">
                            <span class="filter-label">Mesero</span>
                            <select>
                                <option>Todos los meseros</option>
                                <option>Ana García</option>
                                <option>Luis Rodríguez</option>
                                <option>María López</option>
                            </select>
                        </label>

                        <label class="filter-field">
                            <span class="filter-label">Tipo</span>
                            <select>
                                <option>Todos los tipos</option>
                                <option>Consumo en Mesa</option>
                                <option>Para Llevar</option>
                            </select>
                        </label>

                        <label class="filter-field search-field">
                            <span class="filter-label">Búsqueda</span>
                            <div class="search-wrap">
                                <span class="search-icon">🔍</span>
                                <input type="text" placeholder="Buscar pedido...">
                            </div>
                        </label>
                    </div>

                    <!-- Tabla Pedidos -->
                    <div class="tabla-wrap">
                        <table class="tabla-pedidos">
                            <thead>
                            <tr>
                                <th><input type="checkbox"/></th>
                                <th>#</th>
                                <th>Mesa</th>
                                <th>Artículos</th>
                                <th>Estado</th>
                                <th>Tiempo</th>
                                <th>Mesero</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>

                            <tbody id="tbodyPedidos">
                            <?php foreach($pedidosActivos as $p): ?>
                                <tr class="fila-pedido" data-id="<?php echo $p['id'];?>">
                                    <td><input type="checkbox"/></td>
                                    <td>#<?php echo $p['id'];?></td>
                                    <td><?php echo $p['mesa'];?></td>
                                    <td><?php echo $p['articulos'];?></td>
                                    <td>
                                        <?php if($p['estado']=="En preparación"): ?>
                                            <span class="badge badge-prep"><?php echo $p['estado'];?></span>
                                        <?php elseif($p['estado']=="Listo"): ?>
                                            <span class="badge badge-listo"><?php echo $p['estado'];?></span>
                                        <?php else: ?>
                                            <span class="badge badge-pend"><?php echo $p['estado'];?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="hora-t"><?php echo $p['hora'];?></div>
                                        <div class="subt"><?php echo $p['tiempo'];?></div>
                                    </td>
                                    <td>
                                        <div class="mesero-nombre"><?php echo $p['mesero'];?></div>
                                    </td>
                                    <td class="total-cell"><?php echo $p['total'];?></td>
                                    <td class="acciones-cell">👁 🔁 ✅</td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Acciones masivas -->
                    <div class="bulk-actions">
                        <div class="bulk-left">
                            <span id="countSeleccionados">0 pedidos seleccionados</span>
                        </div>
                        <div class="bulk-right">
                            <button class="btn-mini yellow">Marcar en preparación</button>
                            <button class="btn-mini green">Marcar listo</button>
                            <!-- ya NO hay botón "Imprimir tickets" -->
                        </div>
                    </div>
                </div>
            </section>

            <!-- BLOQUE DETALLE DE PEDIDO -->
            <aside class="right-col">
                <div class="card stretch" id="detallePedidoCard">
                    <!-- placeholder -->
                    <div class="detalle-placeholder" id="detalleVacio">
                        <div class="icono-detalle">🧾</div>
                        <h2>Selecciona un Pedido</h2>
                        <p>Haz clic en cualquier pedido de la lista para ver sus detalles completos</p>
                    </div>

                    <!-- detalle lleno -->
                    <div class="detalle-content hidden" id="detalleLleno">
                        <div class="detalle-head">
                            <div>
                                <div class="detalle-id">Pedido #<span id="detId"></span></div>
                                <div class="detalle-mesa" id="detMesa"></div>
                            </div>
                            <div class="detalle-total" id="detTotal"></div>
                        </div>

                        <div class="detalle-info">
                            <div><strong>Mesero:</strong> <span id="detMesero"></span></div>
                            <div><strong>Estado:</strong> <span id="detEstado"></span></div>
                            <div><strong>Hora:</strong> <span id="detHora"></span></div>
                            <div><strong>Tiempo:</strong> <span id="detTiempo"></span></div>
                        </div>

                        <div class="detalle-items">
                            <h3>Artículos</h3>
                            <ul id="detItems"></ul>
                        </div>

                        <div class="detalle-actions">
                            <button class="btn-mini yellow">Marcar en preparación</button>
                            <button class="btn-mini green">Marcar listo</button>
                            <!-- ya NO hay "Imprimir ticket" -->
                        </div>
                    </div>
                </div>
            </aside>
        </section>
    </main>
</div>

<!-- MODAL: Cambiar estado de mesa -->
<div class="modal-overlay hidden" id="modalMesa">
    <div class="modal-card">
        <h2>Cambiar estado de la mesa <span id="modalMesaNum"></span></h2>
        <p>Selecciona el estado actual:</p>

        <div class="modal-opciones">
            <button class="modal-opcion opcion-disponible" data-estado="Disponible">Disponible</button>
            <button class="modal-opcion opcion-ocupada" data-estado="Ocupada">Ocupada</button>
            <button class="modal-opcion opcion-reservada" data-estado="Reservada">Reservada</button>
        </div>

        <div class="modal-actions">
            <button class="btn-mini gray" id="btnCerrarModalMesa">Cerrar</button>
        </div>
    </div>
</div>

<script>
// =====================================
//  RELOJ EN VIVO (horaActual)
// =====================================
setInterval(() => {
    const el = document.getElementById("horaActual");
    if (el) {
        const now = new Date();
        const hh = String(now.getHours()).padStart(2,"0");
        const mm = String(now.getMinutes()).padStart(2,"0");
        const ss = String(now.getSeconds()).padStart(2,"0");
        el.textContent = hh+":"+mm+":"+ss;
    }
}, 1000);

// =====================================
//  REFERENCIAS GLOBALES
// =====================================
const mesasGrid = document.getElementById('mesasGrid');

// =====================================
//  MODAL MESAS (cambiar estado)
// =====================================
const modal = document.getElementById('modalMesa');
const modalMesaNum = document.getElementById('modalMesaNum');
const btnCerrarModal = document.getElementById('btnCerrarModalMesa');
const body = document.body;
let mesaSeleccionadaBtn = null;

function abrirModalMesa(btnMesa) {
    mesaSeleccionadaBtn = btnMesa;
    modalMesaNum.textContent = "Mesa " + btnMesa.dataset.mesa;
    modal.classList.remove('hidden');
    body.style.overflow = 'hidden';
}

function cerrarModalMesa() {
    modal.classList.add('hidden');
    body.style.overflow = '';
}

function eliminarMesaConfirm(mesaBtn){
    const mesaNum = mesaBtn.dataset.mesa || '???';
    Swal.fire({
        title: `¿Eliminar Mesa ${mesaNum}?`,
        text: "Esta acción no se puede deshacer.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar"
    }).then((result)=>{
        if(result.isConfirmed){
            mesaBtn.remove();
        }
    });
}

// Conecta eventos a UNA mesa (click para modal, click para eliminar si tiene X)
function wireMesaEvents(mesaBtn){
    mesaBtn.addEventListener('click', (e)=>{
        // si clickeaste el botón de eliminar (solo en mesas nuevas), no abras modal
        if (e.target.classList.contains('mesa-delete-btn')) return;
        abrirModalMesa(mesaBtn);
    });

    const delBtn = mesaBtn.querySelector('.mesa-delete-btn');
    if (delBtn){
        delBtn.addEventListener('click', (e)=>{
            e.stopPropagation();
            eliminarMesaConfirm(mesaBtn);
        });
    }
}

// Conectamos TODAS las mesas iniciales (no tienen botón eliminar)
document.querySelectorAll('.mesa-card').forEach(wireMesaEvents);

// Botón cerrar modal
btnCerrarModal.addEventListener('click', ()=>{
    cerrarModalMesa();
});

// Cerrar modal haciendo click fuera del cuadro blanco
modal.addEventListener('click', (ev)=>{
    if (ev.target === modal) {
        cerrarModalMesa();
    }
});

// Elegir estado de la mesa
document.querySelectorAll('.modal-opcion').forEach(op=>{
    op.addEventListener('click', ()=>{
        const nuevoEstado = op.dataset.estado;
        if(!mesaSeleccionadaBtn) return;

        // quitar clases previas
        mesaSeleccionadaBtn.classList.remove('disponible','ocupada','reservada');

        // poner la clase según el estado
        if(nuevoEstado === "Disponible") mesaSeleccionadaBtn.classList.add('disponible');
        if(nuevoEstado === "Ocupada") mesaSeleccionadaBtn.classList.add('ocupada');
        if(nuevoEstado === "Reservada") mesaSeleccionadaBtn.classList.add('reservada');

        // actualizar texto visible
        mesaSeleccionadaBtn.querySelector('.mesa-estado-text').textContent = nuevoEstado;
        mesaSeleccionadaBtn.dataset.estado = nuevoEstado;

        cerrarModalMesa();
    });
});

// =====================================
//  AGREGAR MESA (botón Agregar Mesa)
// =====================================
const btnAgregarMesa = document.getElementById('btnAgregarMesa');

function getSiguienteNumeroMesa(){
    // busca el número mayor entre las mesas existentes
    let maxNum = 0;
    document.querySelectorAll('.mesa-card').forEach(m=>{
        const n = parseInt(m.dataset.mesa,10);
        if(n > maxNum) maxNum = n;
    });
    return maxNum + 1;
}

function crearMesaHTML(numMesa){
    const personas = Math.floor(Math.random()*5)+2; // 2..6
    const pedidoId = String(numMesa).padStart(3,'0');

    const btn = document.createElement('button');
    btn.className = 'mesa-card disponible';
    btn.dataset.mesa = numMesa;
    btn.dataset.personas = personas;
    btn.dataset.estado = 'Disponible';

    // IMPORTANTE:
    // Mesas nuevas SÍ llevan botoncito para eliminar
    btn.innerHTML = `
        <div class="mesa-info">
            <div class="mesa-top-row">
                <div class="mesa-nombre">Mesa ${numMesa}</div>
                <button class="mesa-delete-btn" title="Eliminar mesa">✖</button>
            </div>
            <div class="mesa-personas">${personas} personas</div>
            <div class="mesa-estado-text">Disponible</div>
            <div class="mesa-pedido-id">Pedido #${pedidoId}</div>
        </div>
    `;
    return btn;
}

btnAgregarMesa.addEventListener('click', ()=>{
    Swal.fire({
        title: "¿Seguro que quiere agregar una nueva mesa?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Sí",
        cancelButtonText: "No"
    }).then((result)=>{
        if(result.isConfirmed){
            const nuevoNum = getSiguienteNumeroMesa();
            const nuevaMesa = crearMesaHTML(nuevoNum);
            mesasGrid.appendChild(nuevaMesa);
            wireMesaEvents(nuevaMesa);
        }
    });
});

// =====================================
//  PANEL DETALLE PEDIDO (derecha)
// =====================================
const filas = document.querySelectorAll(".fila-pedido");
const detVacio = document.getElementById("detalleVacio");
const detLleno = document.getElementById("detalleLleno");

const detId = document.getElementById("detId");
const detMesa = document.getElementById("detMesa");
const detTotal = document.getElementById("detTotal");
const detMesero = document.getElementById("detMesero");
const detEstado = document.getElementById("detEstado");
const detHora = document.getElementById("detHora");
const detTiempo = document.getElementById("detTiempo");
const detItems = document.getElementById("detItems");

filas.forEach(f => {
    f.addEventListener("click", () => {
        const id = f.dataset.id;
        const mesa = f.children[2].textContent;
        const articulos = f.children[3].textContent.split(",");
        const estado = f.children[4].innerText.trim();
        const hora = f.children[5].querySelector(".hora-t").textContent;
        const tiempo = f.children[5].querySelector(".subt").textContent;
        const mesero = f.children[6].querySelector(".mesero-nombre").textContent;
        const total = f.children[7].textContent;

        detId.textContent = id;
        detMesa.textContent = mesa;
        detTotal.textContent = total;
        detMesero.textContent = mesero;
        detEstado.textContent = estado;
        detHora.textContent = hora;
        detTiempo.textContent = tiempo;

        detItems.innerHTML = "";
        articulos.forEach(a=>{
            const li = document.createElement("li");
            li.textContent = a.trim();
            detItems.appendChild(li);
        });

        detVacio.classList.add("hidden");
        detLleno.classList.remove("hidden");
    });
});

// =====================================
//  CONTADOR DE SELECCIONADOS
// =====================================
const chkRows = document.querySelectorAll(".fila-pedido input[type=checkbox]");
const contador = document.getElementById("countSeleccionados");

chkRows.forEach(chk=>{
    chk.addEventListener("change", ()=>{
        let totalSel = 0;
        chkRows.forEach(c=>{
            if(c.checked) totalSel++;
        });
        contador.textContent = totalSel+" pedidos seleccionados";
    });
});

// =====================================
//  FUNCIÓN LISTA PARA RECIBIR PEDIDOS
//  DESDE Carta_Platillo.php
// =====================================
// Llama agregarPedido({...}) después de guardar el pedido.
function agregarPedido(pedido){
    // pedido = {
    //   id: "007",
    //   mesa: "Mesa 4",
    //   articulos: "Paella x1, Vino x1",
    //   estado: "Pendiente" | "En preparación" | "Listo",
    //   hora: "16:10",
    //   tiempo: "recién creado",
    //   mesero: "Juan Pérez",
    //   total: "Q150.00"
    // }

    const tr = document.createElement('tr');
    tr.className = "fila-pedido";
    tr.dataset.id = pedido.id;

    let badgeClass = "badge-pend";
    if(pedido.estado === "En preparación") badgeClass = "badge-prep";
    if(pedido.estado === "Listo") badgeClass = "badge-listo";

    tr.innerHTML = `
        <td><input type="checkbox"/></td>
        <td>#${pedido.id}</td>
        <td>${pedido.mesa}</td>
        <td>${pedido.articulos}</td>
        <td><span class="badge ${badgeClass}">${pedido.estado}</span></td>
        <td>
            <div class="hora-t">${pedido.hora}</div>
            <div class="subt">${pedido.tiempo}</div>
        </td>
        <td><div class="mesero-nombre">${pedido.mesero}</div></td>
        <td class="total-cell">${pedido.total}</td>
        <td class="acciones-cell">👁 🔁 ✅</td>
    `;

    // click para ver detalle (mismo comportamiento que las filas originales)
    tr.addEventListener("click", () => {
        detId.textContent = pedido.id;
        detMesa.textContent = pedido.mesa;
        detTotal.textContent = pedido.total;
        detMesero.textContent = pedido.mesero;
        detEstado.textContent = pedido.estado;
        detHora.textContent = pedido.hora;
        detTiempo.textContent = pedido.tiempo;

        detItems.innerHTML = "";
        pedido.articulos.split(",").forEach(a=>{
            const li = document.createElement("li");
            li.textContent = a.trim();
            detItems.appendChild(li);
        });

        detVacio.classList.add("hidden");
        detLleno.classList.remove("hidden");
    });

    document.getElementById('tbodyPedidos').appendChild(tr);
}
</script>
</body>
</html>
