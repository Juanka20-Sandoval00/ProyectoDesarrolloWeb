<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Bonanza Tecpán — Método de pago</title>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>
    :root{ --surface:#fff; --text:#2b1a11; --accent:#E6C07B; --primary:#5a341e; }
    *{box-sizing:border-box} 
    body{margin:0; font-family:"Outfit",system-ui,Segoe UI,Roboto,Arial,sans-serif; background:#f6efe6; color:var(--text)}
    .wrap{max-width:1000px; margin:28px auto; padding:0 14px}
    h1{margin:.2rem 0 1rem; font-weight:800}
    .card{background:var(--surface); border:1px solid rgba(0,0,0,.08); border-radius:16px; padding:16px; box-shadow:0 8px 20px rgba(0,0,0,.08); margin-bottom:16px}
    table{width:100%; border-collapse:collapse}
    th,td{padding:10px; border-bottom:1px solid rgba(0,0,0,.06); text-align:left}
    th{background:#faf6ef}
    tfoot td{font-weight:800}
    .row{display:flex; gap:18px; align-items:center; flex-wrap:wrap}
    .spacer{flex:1}
    .btn{appearance:none; border:none; cursor:pointer; padding:.7rem 1.05rem; border-radius:12px; font-weight:800}
    .btn--primary{background:#3b2416; color:#fff}
    .btn--ghost{background:transparent; border:1px solid rgba(0,0,0,.2)}
    .pill{display:inline-flex; gap:.35rem; align-items:center; padding:.45rem .7rem; border:1px solid rgba(0,0,0,.2); border-radius:999px; background:#fff; cursor:pointer}
    .pill input{accent-color:#3b2416}
    .num{width:110px; padding:.5rem .6rem; border-radius:10px; border:1px solid rgba(0,0,0,.2)}
    .muted{color:#6b5b4a; font-size:.9rem}
  </style>
</head>
<body>
  <div class="wrap">
    <h1>Método de pago</h1>

    <!-- Resumen -->
    <div class="card">
      <table id="tblResumen">
        <thead>
          <tr>
            <th style="width:80px;">Cant.</th>
            <th>Descripción</th>
            <th style="width:120px;">Precio</th>
            <th style="width:120px;">Total</th>
          </tr>
        </thead>
        <tbody></tbody>
        <tfoot>
          <tr><td colspan="3" style="text-align:right;">Subtotal</td><td id="tdSub">Q0.00</td></tr>
          <tr><td colspan="3" style="text-align:right;">IVA (12%)</td><td id="tdIva">Q0.00</td></tr>
          <tr><td colspan="3" style="text-align:right;">Propina</td><td id="tdTip">Q0.00</td></tr>
          <tr><td colspan="3" style="text-align:right;">Total a pagar</td><td id="tdTot">Q0.00</td></tr>
        </tfoot>
      </table>
    </div>

    <!-- Propina -->
    <div class="card">
      <div class="row">
        <strong>Propina:</strong>
        <label class="pill"><input type="radio" name="tipMode" value="pct" checked> Porcentaje</label>
        <label class="pill"><input type="radio" name="tipMode" value="amt"> Monto fijo</label>
      </div>

      <div id="tipPctRow" class="row" style="margin-top:10px">
        <label class="pill"><input type="radio" name="tipPct" value="0"  checked> 0%</label>
        <label class="pill"><input type="radio" name="tipPct" value="5"> 5%</label>
        <label class="pill"><input type="radio" name="tipPct" value="10"> 10%</label>
        <label class="pill"><input type="radio" name="tipPct" value="15"> 15%</label>
      </div>

      <div id="tipAmtRow" class="row" style="margin-top:10px; display:none">
        <label><span class="muted">Monto (Q):</span> <input id="tipAmt" type="number" min="0" step="0.01" class="num" value="0.00"></label>
      </div>
      <div class="muted" style="margin-top:6px">La propina es voluntaria y se destina íntegramente al personal de servicio.</div>
    </div>

    <!-- Pago -->
    <div class="card">
      <div class="row">
        <div>
          <strong>Elige método:</strong><br>
          <label class="pill"><input type="radio" name="paym" value="Efectivo" checked> Efectivo</label>
          <label class="pill"><input type="radio" name="paym" value="Tarjeta"> Tarjeta</label>
          <label class="pill"><input type="radio" name="paym" value="Transferencia"> Transferencia</label>
        </div>
        <div class="spacer"></div>
        <div>
          <button id="btnConfirm" class="btn btn--primary">Confirmar pago</button>
          <a class="btn btn--ghost" href="./Carta_Platillo.php">Volver al menú</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    const STORAGE_KEY = 'bonanza_cart_v1';
    const ORDERS_KEY  = 'bonanza_orders_v1';
    const qtz = n => 'Q' + Number(n).toLocaleString('es-GT',{minimumFractionDigits:2, maximumFractionDigits:2});

    function loadCart() {
      const raw = localStorage.getItem(STORAGE_KEY);
      if(!raw) return { cart: [], meta: {} };
      try { return JSON.parse(raw) } catch { return { cart: [], meta: {} } }
    }

    // Estado de la propina
    const tip = { mode: 'pct', pct: 0, amt: 0 };

    function calcTotals(cart){
      const sub = cart.reduce((s,it)=> s + it.precio*it.qty, 0);
      const iva = sub * 0.12;
      const tipValue = tip.mode === 'pct' ? sub * (tip.pct/100) : Number(tip.amt||0);
      const grand = sub + iva + tipValue;
      return { sub, iva, tipValue, grand };
    }

    function paint(){
      const { cart } = loadCart();
      const tb = document.querySelector('#tblResumen tbody');

      if(!cart.length){
        tb.innerHTML = `<tr><td colspan="4" style="text-align:center;color:#777;padding:.8rem">No hay productos.</td></tr>`;
      } else {
        tb.innerHTML = cart.map(it=>{
          const total = it.precio * it.qty;
          return `<tr>
            <td>${it.qty}</td>
            <td><strong>${it.nombre}</strong>${it.nota?`<div style="font-size:.85rem;color:#6b5b4a">${it.nota}</div>`:''}</td>
            <td>${qtz(it.precio)}</td>
            <td><strong>${qtz(total)}</strong></td>
          </tr>`;
        }).join('');
      }

      const { sub, iva, tipValue, grand } = calcTotals(cart);
      document.getElementById('tdSub').textContent = qtz(sub);
      document.getElementById('tdIva').textContent = qtz(iva);
      document.getElementById('tdTip').textContent = qtz(tipValue);
      document.getElementById('tdTot').textContent = qtz(grand);
    }

    // Eventos de propina
    document.querySelectorAll('input[name="tipMode"]').forEach(r=>{
      r.addEventListener('change', ()=>{
        tip.mode = r.value; // 'pct' | 'amt'
        document.getElementById('tipPctRow').style.display = tip.mode==='pct' ? '' : 'none';
        document.getElementById('tipAmtRow').style.display = tip.mode==='amt' ? '' : 'none';
        paint();
      });
    });

    document.querySelectorAll('input[name="tipPct"]').forEach(r=>{
      r.addEventListener('change', ()=>{ tip.pct = Number(r.value||0); paint(); });
    });

    document.getElementById('tipAmt').addEventListener('input', (e)=>{
      tip.amt = Number(e.target.value||0);
      paint();
    });

    // Confirmar pago
    document.getElementById('btnConfirm').addEventListener('click', ()=>{
      const method = document.querySelector('input[name="paym"]:checked')?.value || 'Efectivo';
      const cartData = loadCart();
      if(!cartData.cart.length){
        Swal.fire('Sin productos','No hay productos para cobrar.','info'); 
        return;
      }

      const totals = calcTotals(cartData.cart);
      // Guarda en histórico
      const orders = JSON.parse(localStorage.getItem(ORDERS_KEY) || '[]');
      orders.push({
        when: new Date().toISOString(),
        method,
        tip,            // modo y valor elegido
        totals,         // sub, iva, tipValue, grand
        data: cartData  // items
      });
      localStorage.setItem(ORDERS_KEY, JSON.stringify(orders));

      // Limpia carrito
      localStorage.removeItem(STORAGE_KEY);

      Swal.fire({
        icon:'success',
        title:'Pago registrado',
        html:`<div style="text-align:left">Método: <b>${method}</b><br>
              Propina: <b>${tip.mode==='pct' ? tip.pct+'%' : qtz(tip.amt)}</b><br>
              Total: <b>${qtz(totals.grand)}</b></div>`,
        confirmButtonText:'Volver al menú'
      }).then(()=> window.location.href='./Carta_Platillo.php');
    });

    // Render inicial
    paint();
  </script>
</body>
</html>
