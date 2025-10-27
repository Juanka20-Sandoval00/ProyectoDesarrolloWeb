<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bonanza Tecpán — Menú</title>
  <meta name="description" content="Menú de comidas de Bonanza Tecpán." />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Estilos -->
  <link rel="stylesheet" href="./CSS/style_Carta_Platillo.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>

  <!-- CONTENIDO PRINCIPAL -->
  <main class="content">
    <section id="menu" class="menu">
      <header class="menu__header">
        <h2 class="section-title">Menú</h2>
        <div class="menu__controls">
          <input id="menuSearch" class="input" type="search" placeholder="Buscar platillo o categoría…" aria-label="Buscar">
          <select id="menuCategory" class="select" aria-label="Filtrar por categoría">
            <option value="__ALL__">Todas las categorías</option>
          </select>
        </div>
      </header>
      <div id="menuGrid" class="grid grid--cards"></div>
    </section>
  </main>

  <!-- BARRA LATERAL DERECHA (CARRITO) -->
  <aside class="rightbar" aria-label="Resumen de pedido">
    <header class="rightbar__head">
      <h3>Tu pedido</h3>
      <!-- Antes era 'Limpiar' — ahora es bebida adicional -->
      <button id="btnDrink" class="btn btn--ghost" title="Agregar una bebida">Bebida adicional</button>
    </header>

    <div class="rightbar__tablewrap">
      <table class="cart">
        <thead>
          <tr>
            <th style="width:78px;">Cant.</th>
            <th>Descripción</th>
            <th style="width:86px;">Precio</th>
            <th style="width:90px;">Total</th>
          </tr>
        </thead>
        <tbody id="cartBody">
          <tr><td colspan="4" style="text-align:center;color:#7b6a5a;padding:.9rem">Sin productos</td></tr>
        </tbody>
      </table>
    </div>

    <div class="rightbar__totals">
      <div class="totline"><span>Subtotal</span><strong id="subTotal">Q0.00</strong></div>
      <div class="totline"><span>IVA (12%)</span><strong id="ivaTotal">Q0.00</strong></div>
      <div class="totline totline--grand"><span>Total</span><strong id="grandTotal">Q0.00</strong></div>
    </div>

    <div class="rightbar__actions">
      <button id="btnPay" class="btn btn--primary">Pagar</button>
      <button id="btnClearBottom" class="btn btn--ghost">Limpiar</button>
    </div>
  </aside>

  <!-- Librerías -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Lógica -->
  <script src="./JS/script_Carta_Platillo.js"></script>
</body>
</html>
