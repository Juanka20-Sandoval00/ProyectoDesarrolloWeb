/***********************
 * BONANZA — MENÚ JS   *
 ***********************/

// === CONFIG ===
const CHECKOUT_URL = 'metodo_pago.php'; // ajusta si está en otra carpeta

// === DATOS DE MENÚ ===
const BONANZA_COMIDAS = [
  { categoria: "Desayunos", items: [
    { nombre:"Ranchero derretido", precio:55, desc:"2 huevos estrellados con salsa ranchera y queso derretido, frijol volteado y 2 plátanos fritos.", img:"./IMG/IMG_Platillos/RancheroDerretido.jpg" },
    { nombre:"Omelette Bonanza", precio:95, desc:"Lomito en fajitas, chile pimiento, cebolla y queso derretido, con frijol volteado, queso fresco y 2 plátanos.", img:"./IMG/IMG_Platillos/Omelett.jpg" },
    { nombre:"Alguacil", precio:60, desc:"2 huevos estrellados con crema de espinaca y queso, frijol volteado y 2 plátanos fritos.", img:"./IMG/IMG_Platillos/Alguacil.jpg" },
    { nombre:"Tecpaneco", precio:55, desc:"2 huevos sobre salsa de pepián, queso derretido y trocitos de papa, con frijol y 2 plátanos.", img:"./IMG/IMG_Platillos/Tecpaneco.jpg" },
    { nombre:"Omelette Hacendado", precio:75, desc:"Jamón ahumado y queso derretido con cebolla y chile pimiento, frijoles y 2 plátanos.", img:"./IMG/IMG_Platillos/OmeletteHacendado.jpg" },
    { nombre:"Sano Amanecer", precio:65, desc:"Omelette de claras con champiñón, espinaca, pimientos y cebolla. Con queso, pan integral y aguacate.", img:"./IMG/IMG_Platillos/SanoAmanecer.jpg" },
    { nombre:"La Ponderosa (tostadas francesas)", precio:60, desc:"Pan de la casa, salsa de berries y queso crema.", img:"./IMG/IMG_Platillos/LaPonderosa.jpg" },
    { nombre:"Torre de panqueques con frutas mixtas", precio:55, desc:"Sandía, papaya, melón, piña, banano y miel de abeja.", img:"./IMG/IMG_Platillos/TorrePanqueque.jpg" },
  ]},
  { categoria: "Para Compartir", items: [
    { nombre:"Queso fundido", precio:65, desc:"Mezcla de quesos con toque de vino. Pan o tortilla.", img:"./IMG/IMG_Platillos/QuesoFundido.jpg" },
    { nombre:"Alitas BBQ (1/2 lb)", precio:75, desc:"Salsa barbacoa de la casa.", img:"./IMG/IMG_Platillos/Alitas.jpg" },
    { nombre:"Nachos Bonanza", precio:45, desc:"Queso, guacamol, crema, frijoles rojos y jalapeños.", img:"./IMG/IMG_Platillos/Nachos.jpg" },
    { nombre:"Aros de cebolla", precio:35, desc:"Crujientes y doraditos.", img:"./IMG/IMG_Platillos/ArosDeCebolla.jpg" },
  ]},
  { categoria: "Ensaladas y Sopa", items: [
    { nombre:"Sopa granjera", precio:45, desc:"Caldo de pollo con mozzarella, arroz y aguacate.", img:"./IMG/IMG_Platillos/sopa_granjera.jpg" },
    { nombre:"Mamanuchi", precio:85, desc:"Mix de lechugas, pollo, tocino, mozzarella, huevo duro, cebolla morada, tomate y pepitoria.", img:"./IMG/IMG_Platillos/mamanuchi.jpg" },
    { nombre:"Bonanza", precio:80, desc:"Mix de lechugas con pollo, aguacate, maíz tierno y aderezo de la casa.", img:"./IMG/IMG_Platillos/ensalada_bonanza.jpg" },
  ]},
  { categoria: "Cortes Premium", items: [
    { nombre:"Rib Eye 12 onzas", precio:250, desc:"Término a tu gusto.", img:"./IMG/IMG_Platillos/ribeye_12.jpg" },
    { nombre:"Arrachera 8 onzas", precio:160, desc:"Marinada, suave y jugosa.", img:"./IMG/IMG_Platillos/arrachera_8.jpg" },
    { nombre:"Puyazo 8 onzas", precio:175, desc:"Con mantequilla de romero y cebollines.", img:"./IMG/IMG_Platillos/puyazo_8.jpg" },
  ]},
  { categoria: "Almuerzos / Platos Mixtos", items: [
    { nombre:"Mar y Tierra", precio:185, desc:"8 oz de lomito + camarones jumbo al ajillo, con espárragos y vegetales.", img:"./IMG/IMG_Platillos/mar_tierra.jpg" },
    { nombre:"Salmón chileno", precio:150, desc:"A la plancha con salsa de vino, torta de papa, vegetales y espárragos.", img:"./IMG/IMG_Platillos/salmon.jpg" },
    { nombre:"Camarones al ajillo", precio:150, desc:"Con vegetales salteados y espárragos.", img:"./IMG/IMG_Platillos/camarones.jpg" },
    { nombre:"Parrillada para 2", precio:260, desc:"Lomito, puyazo, costilla BBQ, chorizo, longaniza y pollo.", img:"./IMG/IMG_Platillos/parrillada2.jpg" },
  ]},
  { categoria: "Típico", items: [
    { nombre:"Pepián de gallina", precio:85, desc:"Con arroz, aguacate y tamalito con chipilín.", img:"./IMG/IMG_Platillos/pepian.jpg" },
    { nombre:"Caldo de gallina", precio:95, desc:"Gallina criolla, arroz, aguacate y tamalito con chipilín.", img:"./IMG/IMG_Platillos/caldo_gallina.jpg" },
    { nombre:"Estofado tecpaneco", precio:80, desc:"De res, con vegetales.", img:"./IMG/IMG_Platillos/estofado.jpg" },
    { nombre:"Chile relleno", precio:80, desc:"Elaborado con carne de res, servido con arroz.", img:"./IMG/IMG_Platillos/chile_relleno.jpg" },
  ]},
  { categoria: "Pastas", items: [
    { nombre:"Colorado", precio:90, desc:"Spaghetti alfredo con fajitas de pollo.", img:"./IMG/IMG_Platillos/pasta_colorado.jpg" },
    { nombre:"Virginia", precio:105, desc:"Spaghetti con tomates frescos, camarones y parmesano.", img:"./IMG/IMG_Platillos/pasta_virginia.jpg" },
    { nombre:"Montana", precio:115, desc:"Salsa blanca con mix de mariscos y parmesano.", img:"./IMG/IMG_Platillos/pasta_montana.jpg" },
  ]},
  { categoria: "Pizzas", items: [
    { nombre:"Jamón", precio:85, desc:"Base de tomate y aceite de oliva con jamón y mozzarella.", img:"./IMG/IMG_Platillos/pizza_jamon.jpg" },
    { nombre:"Montura", precio:95, desc:"Pollo, cebolla morada, mozzarella y parmesano sobre salsa Alfredo.", img:"./IMG/IMG_Platillos/pizza_montura.jpg" },
    { nombre:"Herradura", precio:100, desc:"Chorizo, longaniza y jamón serrano, tomate cherry y queso Chancol.", img:"./IMG/IMG_Platillos/pizza_herradura.jpg" },
    { nombre:"Arisco", precio:100, desc:"Mozzarella, cheddar, parmesano, steak, chorizo, pepperoni y cebolla morada.", img:"./IMG/IMG_Platillos/pizza_arisco.jpg" },
  ]},
  { categoria: "Hamburguesas", items: [
    { nombre:"La Clásica", precio:65, desc:"Queso hamburguesa, acompañada de papas fritas.", img:"./IMG/IMG_Platillos/hamburguesa_clasica.jpg" },
    { nombre:"Big Hoss", precio:89, desc:"Res con queso suizo, tocino, champiñones y cebolla en BBQ.", img:"./IMG/IMG_Platillos/hamburguesa_hoss.jpg" },
    { nombre:"Big Gordo", precio:105, desc:"Doble carne, doble queso, tocino, aros de cebolla y BBQ.", img:"./IMG/IMG_Platillos/hamburguesa_gordo.jpg" },
    { nombre:"Little Joe", precio:70, desc:"Pechuga empanizada, queso suizo y vegetales.", img:"./IMG/IMG_Platillos/hamburguesa_littlejoe.jpg" },
    { nombre:"Chancol", precio:105, desc:"Res con queso Chancol y salsa de whiskey.", img:"./IMG/IMG_Platillos/hamburguesa_chancol.jpg" },
  ]},
  { categoria: "Sandwiches", items: [
    { nombre:"Del Rancho", precio:85, desc:"Chapata con lomito, aguacate, pimientos, mozzarella y pesto.", img:"./IMG/IMG_Platillos/sandwich_rancho.jpg" },
    { nombre:"Del Corral", precio:75, desc:"Chapata con pollo asado, champiñones, mozzarella y aderezo de la casa.", img:"./IMG/IMG_Platillos/sandwich_corral.jpg" },
    { nombre:"Del Huerto", precio:72, desc:"Chapata con vegetales salteados, aguacate y mozzarella.", img:"./IMG/IMG_Platillos/sandwich_huerto.jpg" },
    { nombre:"Del Campo", precio:80, desc:"Chapata con costillas BBQ sin hueso, aguacate y lechuga.", img:"./IMG/IMG_Platillos/sandwich_campo.jpg" },
  ]},
  { categoria: "Menú Infantil", items: [
    { nombre:"Vaquerito Americano", precio:40, desc:"1 huevo, 1 panqueque, tocino y fruta. Incluye jugo pequeño o café.", img:"./IMG/IMG_Platillos/kids_vaquerito.jpg" },
    { nombre:"Panqueques (2)", precio:35, desc:"Con fruta y miel.", img:"./IMG/IMG_Platillos/kids_panqueques.jpg" },
    { nombre:"Sincronizado", precio:40, desc:"Tortillas de harina con queso y jamón virginia, con fruta.", img:"./IMG/IMG_Platillos/kids_sincronizado.jpg" },
    { nombre:"Quesohamburguesa", precio:45, desc:"Con papas y bebida natural.", img:"./IMG/IMG_Platillos/kids_burger.jpg" },
    { nombre:"Pizza (jamón o pepperoni)", precio:45, desc:"Con bebida natural.", img:"./IMG/IMG_Platillos/kids_pizza.jpg" },
    { nombre:"Deditos de pollo", precio:45, desc:"Con papas y bebida natural.", img:"./IMG/IMG_Platillos/kids_deditos.jpg" },
    { nombre:"Mini pasta", precio:45, desc:"Salsa blanca y jamón, pan y bebida natural.", img:"./IMG/IMG_Platillos/kids_pasta.jpg" },
  ]},
];

// === BEBIDAS ADICIONALES ===
const DRINK_PRICES = {
  "Coca-Cola": 10, "Coca-Cola Zero": 10, "Pepsi": 10, "7up": 10,
  "Fresca": 10, "Agua pura": 8, "Jugo natural": 12
};

// === PERSISTENCIA ===
const STORAGE_KEY = 'bonanza_cart_v1';
function saveCartLS(){ localStorage.setItem(STORAGE_KEY, JSON.stringify({cart, meta:{fecha:new Date().toISOString()}})); }
function loadCartLS(){
  try{
    const raw = localStorage.getItem(STORAGE_KEY);
    if(!raw) return;
    const parsed = JSON.parse(raw);
    if(Array.isArray(parsed?.cart)) cart.splice(0, cart.length, ...parsed.cart);
  }catch{}
}

// === CARRITO ===
const cart = []; // {id, nombre, precio, qty, nota}
const findInCart = id => cart.find(it => it.id === id);
const qtz = n => `Q${Number(n).toLocaleString('es-GT',{minimumFractionDigits:2, maximumFractionDigits:2})}`;

function addToCart({id, nombre, precio, nota}) {
  const key = id + (nota ? `|${nota}` : '');
  const row = findInCart(key);
  if(row){ row.qty++; } else { cart.push({ id:key, nombre, precio:+precio, qty:1, nota:nota||'' }); }
  renderCart();
}
function updateQty(id, delta){
  const r = cart.find(x => x.id === id); if(!r) return;
  r.qty += delta; if(r.qty<=0) cart.splice(cart.indexOf(r),1);
  renderCart();
}
function clearCart(){ cart.splice(0,cart.length); renderCart(); }

// SIN IVA: total = subtotal
function totals(){
  const sub = cart.reduce((s,it)=> s + it.precio*it.qty, 0);
  return { sub, grand: sub };
}

function renderCart(){
  const $body = document.getElementById('cartBody');
  if(!cart.length){
    $body.innerHTML = `<tr><td colspan="4" style="text-align:center;color:#7b6a5a;padding:.9rem">Sin productos</td></tr>`;
  }else{
    $body.innerHTML = cart.map(it=>{
      const total = it.precio*it.qty;
      return `<tr data-id="${it.id}">
        <td>
          <div class="qtyctl">
            <button class="qtybtn" data-act="minus">-</button>
            <strong>${it.qty}</strong>
            <button class="qtybtn" data-act="plus">+</button>
          </div>
        </td>
        <td><strong>${it.nombre}</strong>${it.nota?`<span class="note">${it.nota}</span>`:''}</td>
        <td>${qtz(it.precio)}</td>
        <td><strong>${qtz(total)}</strong></td>
      </tr>`;
    }).join('');
  }

  const {sub, grand} = totals();
  document.getElementById('subTotal').textContent = qtz(sub);
  document.getElementById('grandTotal').textContent = qtz(grand);

  // Oculta la fila de IVA si existe en el HTML
  const ivaNode = document.getElementById('ivaTotal');
  if (ivaNode) {
    ivaNode.textContent = 'Q0.00';
    const ivaLine = ivaNode.parentElement;
    if (ivaLine) ivaLine.style.display = 'none';
  }

  saveCartLS();
}

// === RENDER DE TARJETAS ===
(function(){
  const data = BONANZA_COMIDAS.filter(c=>Array.isArray(c.items));
  const $grid = document.getElementById('menuGrid');
  const $cat  = document.getElementById('menuCategory');
  const $q    = document.getElementById('menuSearch');

  // categorías
  const existentes = new Set([...$cat.options].map(o=>o.value));
  ["__ALL__", ...data.map(c=>c.categoria)].forEach(c=>{
    if(existentes.has(c)) return;
    const opt = document.createElement('option');
    opt.value=c; opt.textContent = c==="__ALL__"?"Todas las categorías":c;
    $cat.appendChild(opt);
  });

  function card(it){
    const img = it.img || "./IMG/placeholder.jpg";
    return `
      <article class="card card--menu" data-item='${JSON.stringify({n:it.nombre,p:it.precio}).replace(/'/g,"&apos;")}'>
        <div class="card__media"><img src="${img}" alt="${it.nombre}"></div>
        <div class="card__body">
          <div class="card__head">
            <h3 class="card__title">${it.nombre}</h3>
            <span class="price-text">Q${Number(it.precio).toLocaleString('es-GT')}</span>
          </div>
          <p class="card__desc">${it.desc || ""}</p>
          <div class="card__footer">
            <span class="chip">${it.categoria}</span>
            <button class="btn btn--add">Agregar</button>
          </div>
        </div>
      </article>`;
  }

  function render(){
    const term = ($q.value||"").toLowerCase().trim();
    const cat  = $cat.value;
    const rows = [];
    data.forEach(c=>{
      if(cat!=="__ALL__" && c.categoria!==cat) return;
      c.items.forEach(it=>{
        const hay=(it.nombre||"").toLowerCase(); const dsc=(it.desc||"").toLowerCase();
        if(!term || hay.includes(term) || dsc.includes(term)) rows.push({...it,categoria:c.categoria});
      });
    });
    $grid.innerHTML = rows.length ? rows.map(card).join('') : `<p class="muted">No hay resultados.</p>`;
  }
  $cat.addEventListener('change', render);
  $q.addEventListener('input', render);
  render();

  // click en tarjeta o botón agregar ⇒ pide gaseosa incluida (sin costo)
  $grid.addEventListener('click', async ev=>{
    const card = ev.target.closest('.card--menu'); if(!card) return;
    if(!ev.target.classList.contains('btn--add') && ev.target.tagName!=='ARTICLE' && !card.contains(ev.target)) return;
    const {n,p} = JSON.parse(card.getAttribute('data-item').replaceAll('&apos;',"'"));
    const soda = await pickSoda(); if(soda === undefined) return;
    addToCart({id:n, nombre:n, precio:+p, nota:`Gaseosa incluida: ${soda}`});
  });
})();

// === MODALES DE BEBIDA ===
async function pickSoda(){
  const { value:soda, isDismissed } = await Swal.fire({
    title: 'Elige la gaseosa incluida',
    input: 'select',
    inputOptions: {
      'Coca-Cola': 'Coca-Cola','Coca-Cola Zero': 'Coca-Cola Zero','Pepsi': 'Pepsi',
      '7up': '7up','Fresca': 'Fresca','Agua pura': 'Agua pura'
    },
    inputPlaceholder: 'Selecciona una opción',
    confirmButtonText: 'Agregar',
    showCancelButton: true, cancelButtonText: 'Cancelar',
    confirmButtonColor:'#3b2416'
  });
  if(isDismissed) return undefined;
  return soda || 'Sin especificar';
}

document.addEventListener('click', async (e)=>{
  // bebida adicional
  if(e.target.id === 'btnDrink'){
    const { value: soda, isDismissed } = await Swal.fire({
      title: 'Bebida adicional',
      input: 'select',
      inputOptions: Object.fromEntries(Object.keys(DRINK_PRICES).map(k => [k, `${k} — Q${DRINK_PRICES[k]}`])),
      inputPlaceholder: 'Selecciona una opción',
      confirmButtonText: 'Agregar al carrito',
      showCancelButton: true, cancelButtonText: 'Cancelar',
      confirmButtonColor:'#3b2416'
    });
    if(isDismissed) return;
    const precio = DRINK_PRICES[soda] ?? 10;
    addToCart({ id:`bebida_${soda}`, nombre:soda, precio, nota:'Bebida adicional' });
  }

  // cantidad +/- en carrito
  const btn = e.target.closest('.qtybtn');
  if(btn){
    const tr = btn.closest('tr'); const id = tr?.dataset.id;
    updateQty(id, btn.dataset.act==='plus' ? 1 : -1);
  }

  // LIMPIAR
  if(e.target.id==='btnClearBottom'){
    Swal.fire({
      title:'¿Limpiar pedido?', text:'Se eliminarán todos los productos del carrito.',
      icon:'warning', showCancelButton:true, confirmButtonText:'Sí, limpiar', cancelButtonText:'Cancelar',
      confirmButtonColor:'#3b2416'
    }).then(r=>{ if(r.isConfirmed){ clearCart(); }});
  }

  // PAGAR (redirigir SIN SweetAlert)
  if(e.target.id==='btnPay'){
    if(!cart.length) return;
    saveCartLS();
    window.location.href = CHECKOUT_URL;
  }
});

// === INICIO ===
loadCartLS();
renderCart();
