// ====== DATOS (solo COMIDAS) – Bonanza Tecpán ======
const BONANZA_COMIDAS = [
  { categoria: "Desayunos", items: [
    { nombre:"Ranchero derretido", precio:55, desc:"2 huevos estrellados con salsa ranchera y queso derretido, frijol volteado y 2 plátanos fritos.", img:"../IMG_PaginaWeb/IMG_Platillos/RancheroDerretido.jpg" },
    { nombre:"Omelette Bonanza", precio:95, desc:"Lomito en fajitas, chile pimiento, cebolla y queso derretido, con frijol volteado, queso fresco y 2 plátanos.", img:"../IMG_PaginaWeb/IMG_Platillos/Omelett.jpg" },
    { nombre:"Alguacil", precio:60, desc:"2 huevos estrellados con crema de espinaca y queso, frijol volteado y 2 plátanos fritos.", img:"../IMG_PaginaWeb/IMG_Platillos/Alguacil.jpg" },
    { nombre:"Tecpaneco", precio:55, desc:"2 huevos sobre salsa de pepián, queso derretido y trocitos de papa, con frijol y 2 plátanos.", img:"../IMG_PaginaWeb/IMG_Platillos/Tecpaneco.jpg" },
    { nombre:"Omelette Hacendado", precio:75, desc:"Jamón ahumado y queso derretido con cebolla y chile pimiento, frijoles y 2 plátanos. Opcional: queso mozzarella.", img:"../IMG_PaginaWeb/IMG_Platillos/OmeletteHacendado.jpg" },
    { nombre:"Sano Amanecer", precio:65, desc:"Omelette de claras con champiñón, espinaca, pimientos y cebolla. Con queso, pan integral y aguacate.", img:"../IMG_PaginaWeb/IMG_Platillos/SanoAmanecer.jpg" },
    { nombre:"La Ponderosa (tostadas francesas)", precio:60, desc:"Pan de la casa, salsa de berries y queso crema.", img:"../IMG_PaginaWeb/IMG_Platillos/LaPonderosa.jpg" },
    { nombre:"Torre de panqueques con frutas mixtas", precio:55, desc:"Sandía, papaya, melón, piña, banano y miel de abeja.", img:"../IMG_PaginaWeb/IMG_Platillos/TorrePanqueque.jpg" },
  ]},

  { categoria: "Para Compartir", items: [
    { nombre:"Queso fundido", precio:65, desc:"Mezcla de quesos con toque de vino. Pan o tortilla.", img:"../IMG_PaginaWeb/IMG_Platillos/QuesoFundido.jpg" },
    { nombre:"Alitas BBQ (1/2 lb)", precio:75, desc:"Salsa barbacoa de la casa.", img:"../IMG_PaginaWeb/IMG_Platillos/Alitas.jpg" },
    { nombre:"Nachos Bonanza", precio:45, desc:"Queso, guacamol, crema, frijoles rojos y jalapeños.", img:"../IMG_PaginaWeb/IMG_Platillos/Nachos.jpg" },
    { nombre:"Aros de cebolla", precio:35, desc:"Crujientes y doraditos.", img:"../IMG_PaginaWeb/IMG_Platillos/ArosDeCebolla.jpg" },
  ]},

  { categoria: "Ensaladas y Sopa", items: [
    { nombre:"Sopa granjera", precio:45, desc:"Caldo de pollo con mozzarella, arroz y aguacate.", img:"../IMG_PaginaWeb/IMG_Platillos/sopa_granjera.jpg" },
    { nombre:"Mamanuchi", precio:85, desc:"Mix de lechugas, pollo, tocino, mozzarella, huevo duro, cebolla morada, tomate y pepitoria.", img:"../IMG_PaginaWeb/IMG_Platillos/mamanuchi.jpg" },
    { nombre:"Bonanza", precio:80, desc:"Mix de lechugas con pollo, aguacate, maíz tierno y aderezo de la casa.", img:"../IMG_PaginaWeb/IMG_Platillos/ensalada_bonanza.jpg" },
  ]},

  { categoria: "Cortes Premium", items: [
    { nombre:"Rib Eye 12 onzas", precio:250, desc:"Término a tu gusto.", img:"../IMG_PaginaWeb/IMG_Platillos/ribeye_12.jpg" },
    { nombre:"Arrachera 8 onzas", precio:160, desc:"Marinada, suave y jugosa.", img:"../IMG_PaginaWeb/IMG_Platillos/arrachera_8.jpg" },
    { nombre:"Puyazo 8 onzas", precio:175, desc:"Con mantequilla de romero y cebollines.", img:"../IMG_PaginaWeb/IMG_Platillos/puyazo_8.jpg" },
  ]},

  { categoria: "Almuerzos / Platos Mixtos", items: [
    { nombre:"Mar y Tierra", precio:185, desc:"8 oz de lomito + camarones jumbo al ajillo, con espárragos y vegetales.", img:"../IMG_PaginaWeb/IMG_Platillos/mar_tierra.jpg" },
    { nombre:"Salmón chileno", precio:150, desc:"A la plancha con salsa de vino, torta de papa, vegetales y espárragos.", img:"../IMG_PaginaWeb/IMG_Platillos/salmon.jpg" },
    { nombre:"Camarones al ajillo", precio:150, desc:"Con vegetales salteados y espárragos.", img:"../IMG_PaginaWeb/IMG_Platillos/camarones.jpg" },
    { nombre:"Parrillada para 2", precio:260, desc:"Lomito, puyazo, costilla BBQ, chorizo, longaniza y pollo.", img:"../IMG_PaginaWeb/IMG_Platillos/parrillada2.jpg" },
  ]},

  { categoria: "Típico", items: [
    { nombre:"Pepián de gallina", precio:85, desc:"Con arroz, aguacate y tamalito con chipilín.", img:"../IMG_PaginaWeb/IMG_Platillos/pepian.jpg" },
    { nombre:"Caldo de gallina", precio:95, desc:"Gallina criolla, arroz, aguacate y tamalito con chipilín.", img:"../IMG_PaginaWeb/IMG_Platillos/caldo_gallina.jpg" },
    { nombre:"Estofado tecpaneco", precio:80, desc:"De res, con vegetales.", img:"../IMG_PaginaWeb/IMG_Platillos/estofado.jpg" },
    { nombre:"Chile relleno", precio:80, desc:"Elaborado con carne de res, servido con arroz.", img:"../IMG_PaginaWeb/IMG_Platillos/chile_relleno.jpg" },
  ]},

  { categoria: "Pastas", items: [
    { nombre:"Colorado", precio:90, desc:"Spaghetti alfredo con fajitas de pollo.", img:"../IMG_PaginaWeb/IMG_Platillos/pasta_colorado.jpg" },
    { nombre:"Virginia", precio:105, desc:"Spaghetti con tomates frescos, camarones y parmesano.", img:"../IMG_PaginaWeb/IMG_Platillos/pasta_virginia.jpg" },
    { nombre:"Montana", precio:115, desc:"Salsa blanca con mix de mariscos y parmesano.", img:"../IMG_PaginaWeb/IMG_Platillos/pasta_montana.jpg" },
  ]},

  { categoria: "Pizzas", items: [
    { nombre:"Jamón", precio:85, desc:"Base de tomate y aceite de oliva con jamón y mozzarella.", img:"../IMG_PaginaWeb/IMG_Platillos/pizza_jamon.jpg" },
    { nombre:"Montura", precio:95, desc:"Pollo, cebolla morada, mozzarella y parmesano sobre salsa Alfredo.", img:"../IMG_PaginaWeb/IMG_Platillos/pizza_montura.jpg" },
    { nombre:"Herradura", precio:100, desc:"Chorizo, longaniza y jamón serrano, tomate cherry y queso Chancol.", img:"../IMG_PaginaWeb/IMG_Platillos/pizza_herradura.jpg" },
    { nombre:"Arisco", precio:100, desc:"Mozzarella, cheddar, parmesano, steak, chorizo, pepperoni y cebolla morada.", img:"../IMG_PaginaWeb/IMG_Platillos/pizza_arisco.jpg" },
  ]},

  { categoria: "Hamburguesas", items: [
    { nombre:"La Clásica", precio:65, desc:"Queso hamburguesa, acompañada de papas fritas.", img:"../IMG_PaginaWeb/IMG_Platillos/hamburguesa_clasica.jpg" },
    { nombre:"Big Hoss", precio:89, desc:"Res con queso suizo, tocino, champiñones y cebolla en BBQ.", img:"../IMG_PaginaWeb/IMG_Platillos/hamburguesa_hoss.jpg" },
    { nombre:"Big Gordo", precio:105, desc:"Doble carne, doble queso, tocino, aros de cebolla y BBQ.", img:"../IMG_PaginaWeb/IMG_Platillos/hamburguesa_gordo.jpg" },
    { nombre:"Little Joe", precio:70, desc:"Pechuga empanizada, queso suizo y vegetales.", img:"../IMG_PaginaWeb/IMG_Platillos/hamburguesa_littlejoe.jpg" },
    { nombre:"Chancol", precio:105, desc:"Res con queso Chancol y salsa de whiskey.", img:"../IMG_PaginaWeb/IMG_Platillos/hamburguesa_chancol.jpg" },
  ]},

  { categoria: "Sandwiches", items: [
    { nombre:"Del Rancho", precio:85, desc:"Chapata con lomito, aguacate, pimientos, mozzarella y pesto.", img:"../IMG_PaginaWeb/IMG_Platillos/sandwich_rancho.jpg" },
    { nombre:"Del Corral", precio:75, desc:"Chapata con pollo asado, champiñones, mozzarella y aderezo de la casa.", img:"../IMG_PaginaWeb/IMG_Platillos/sandwich_corral.jpg" },
    { nombre:"Del Huerto", precio:72, desc:"Chapata con vegetales salteados, aguacate y mozzarella.", img:"../IMG_PaginaWeb/IMG_Platillos/sandwich_huerto.jpg" },
    { nombre:"Del Campo", precio:80, desc:"Chapata con costillas BBQ sin hueso, aguacate y lechuga.", img:"../IMG_PaginaWeb/IMG_Platillos/sandwich_campo.jpg" },
  ]},

  { categoria: "Menú Infantil", items: [
    { nombre:"Vaquerito Americano", precio:40, desc:"1 huevo, 1 panqueque, tocino y fruta. Incluye jugo pequeño o café.", img:"../IMG_PaginaWeb/IMG_Platillos/kids_vaquerito.jpg" },
    { nombre:"Panqueques (2)", precio:35, desc:"Con fruta y miel.", img:"../IMG_PaginaWeb/IMG_Platillos/kids_panqueques.jpg" },
    { nombre:"Sincronizado", precio:40, desc:"Tortillas de harina con queso y jamón virginia, con fruta.", img:"../IMG_PaginaWeb/IMG_Platillos/kids_sincronizado.jpg" },
    { nombre:"Quesohamburguesa", precio:45, desc:"Con papas y bebida natural.", img:"../IMG_PaginaWeb/IMG_Platillos/kids_burger.jpg" },
    { nombre:"Pizza (jamón o pepperoni)", precio:45, desc:"Con bebida natural.", img:"../IMG_PaginaWeb/IMG_Platillos/kids_pizza.jpg" },
    { nombre:"Deditos de pollo", precio:45, desc:"Con papas y bebida natural.", img:"../IMG_PaginaWeb/IMG_Platillos/kids_deditos.jpg" },
    { nombre:"Mini pasta", precio:45, desc:"Salsa blanca y jamón, pan y bebida natural.", img:"../IMG_PaginaWeb/IMG_Platillos/kids_pasta.jpg" },
  ]},
];


// ====== RENDER (buscador + categorías + tarjetas) ======
(function(){
  const data = BONANZA_COMIDAS.filter(c => Array.isArray(c.items));
  const $grid = document.getElementById('menuGrid');
  const $cat  = document.getElementById('menuCategory');
  const $q    = document.getElementById('menuSearch');

  // Llenar combo (sin duplicar "__ALL__" ni categorías ya presentes en HTML)
  const existentes = new Set([...$cat.options].map(o => o.value));
  ["__ALL__", ...data.map(c => c.categoria)].forEach(c => {
    if (existentes.has(c)) return;
    const opt = document.createElement('option');
    opt.value = c;
    opt.textContent = c === "__ALL__" ? "Todas las categorías" : c;
    $cat.appendChild(opt);
  });

  const qtz = n => `Q${Number(n).toLocaleString('es-GT')}`;

  // Tarjeta con precio estilo "píldora" al pie (igual que en Bebidas)
  function card(it){
    const alt = it.nombre || "Platillo";
    const img = it.img || "../IMG_PaginaWeb/placeholder.jpg";
    return `
      <article class="card card--menu" aria-label="${alt}">
        <div class="card__media"><img src="${img}" alt="${alt}"></div>
        <div class="card__body">
          <div class="card__head">
            <h3 class="card__title">${it.nombre}</h3>
          </div>
          <p class="card__desc">${it.desc || ""}</p>
          <div class="card__footer">
            <span class="chip">${it.categoria}</span>
            <span class="price-pill"><span>PRECIO</span><strong>${qtz(it.precio)}</strong></span>
          </div>
        </div>
      </article>
    `;
  }

  function render(){
    const term = ($q.value||"").toLowerCase().trim();
    const cat  = $cat.value;

    const rows = [];
    data.forEach(c => {
      if (cat !== "__ALL__" && c.categoria !== cat) return;
      c.items.forEach(it => {
        const hay = (it.nombre||"").toLowerCase();
        const dsc = (it.desc||"").toLowerCase();
        if (!term || hay.includes(term) || dsc.includes(term)) {
          rows.push({ ...it, categoria: c.categoria });
        }
      });
    });

    $grid.innerHTML = rows.length
      ? rows.map(card).join('')
      : `<p class="muted">No hay resultados en esta categoría.</p>`;
  }

  $cat.addEventListener('change', render);
  $q.addEventListener('input', render);
  render();
})();

