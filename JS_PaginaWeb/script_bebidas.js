// ====== DATOS (solo BEBIDAS) – Bonanza Tecpán ======
const BONANZA_BEBIDAS = [
  { categoria:"Bebidas Frías", items:[
    { nombre:"Limonada Bonanza", precio:29, desc:"Clásica o con soda, muy refrescante.", img:"../IMG_PaginaWeb/IMG_Bebidas/Limonada_Bonanza.jpeg" },
    { nombre:"Cremosita Bonanza", precio:29, desc:"Limonada en versión cremosa, bien fría.", img:"../IMG_PaginaWeb/IMG_Bebidas/Cremosita.jpg" },
    { nombre:"Smoothie: Piña y coco", precio:29, desc:"Piña, coco y hielo; textura suave.", img:"../IMG_PaginaWeb/IMG_Bebidas/PiñayCoco.jpg" },
    { nombre:"Smoothie: Maracuyá", precio:29, desc:"Maracuyá natural con toque cítrico.", img:"../IMG_PaginaWeb/IMG_Bebidas/Maracuya.jpg" },
    { nombre:"Smoothie: Naranja y pepita", precio:29, desc:"Naranja fresca con pepita tostada.", img:"../IMG_PaginaWeb/IMG_Bebidas/NaranjayPepita.jpg" },
    { nombre:"Falabella", precio:32, desc:"Zanahoria, naranja, piña y miel.", img:"../IMG_PaginaWeb/IMG_Bebidas/Falabella.jpeg" },
    { nombre:"Mustang", precio:32, desc:"Aguacate, espinaca, naranja, piña y chan.", img:"../IMG_PaginaWeb/IMG_Bebidas/Mustang.jpg" },
    { nombre:"Frisón", precio:32, desc:"Manzana, banano, leche de almendra y nueces.", img:"../IMG_PaginaWeb/IMG_Bebidas/Frison.jpeg" },
    { nombre:"Percherón", precio:32, desc:"Avena, papaya, almendras, leche y miel.", img:"../IMG_PaginaWeb/IMG_Bebidas/Percheron.jpeg" },
    { nombre:"Appaloosa", precio:32, desc:"Manzana verde, espinaca, apio y limón.", img:"../IMG_PaginaWeb/IMG_Bebidas/Appaloosa.jpg" },
    { nombre:"Pichele de naranjada", precio:80, desc:"Jarra para compartir (4–5 vasos).", img:"../IMG_PaginaWeb/IMG_Bebidas/PichelNaranja.jpg" },
    { nombre:"Gaseosas", precio:18, desc:"Variedad de sodas bien frías.", img:"../IMG_PaginaWeb/IMG_Bebidas/Gaseosa.jpg" },
  ]},

  { categoria:"Café Frío", items:[
    { nombre:"Iced Coffee", precio:22, desc:"Café de altura servido con hielo.", img:"../IMG_PaginaWeb/IMG_Bebidas/IcedCoffee.jpg" },
    { nombre:"Iced Latte", precio:25, desc:"Espresso con leche fría y hielo.", img:"../IMG_PaginaWeb/IMG_Bebidas/IcedLatte.jpg" },
    { nombre:"Oreo Frappuccino", precio:32, desc:"Café batido con leche y galleta.", img:"../IMG_PaginaWeb/IMG_Bebidas/OreoFrap.jpg" },
    { nombre:"Marshmellow Frappe", precio:32, desc:"Café frío con toque de malvavisco.", img:"../IMG_PaginaWeb/IMG_Bebidas/MarshmellowFrappe.jpg" },
  ]},

  { categoria:"Bebidas Calientes", items:[
    { nombre:"Café negro", precio:12, desc:"Taza pequeña, sabor intenso.", img:"../IMG_PaginaWeb/IMG_Bebidas/CafeNegro.jpg" },
    { nombre:"Café con leche", precio:16, desc:"Blend suave con leche caliente.", img:"../IMG_PaginaWeb/IMG_Bebidas/CafeLeche.jpg" },
    { nombre:"Latte", precio:22, desc:"Espresso y leche vaporizada.", img:"../IMG_PaginaWeb/IMG_Bebidas/Latte.jpg" },
    { nombre:"Té de sabores", precio:12, desc:"Manzanilla, frutos rojos o limón.", img:"../IMG_PaginaWeb/IMG_Bebidas/TeSabores.jpg" },
  ]},

  { categoria:"Cócteles", items:[
    { nombre:"Margarita Frozen", precio:40, desc:"Fresa, maracuyá o limón a elección.", img:"../IMG_PaginaWeb/IMG_Bebidas/Margarita.jpg" },
    { nombre:"Mojito", precio:38, desc:"Ron blanco, hierbabuena y limón.", img:"../IMG_PaginaWeb/IMG_Bebidas/Mojito.jpg" },
    { nombre:"Piña Colada", precio:40, desc:"Clásica, cremosa y refrescante.", img:"../IMG_PaginaWeb/IMG_Bebidas/PiñaColada.jpg" },
    { nombre:"Aperol Spritz", precio:40, desc:"Aperol, prosecco y un toque de soda.", img:"../IMG_PaginaWeb/IMG_Bebidas/Aperol.jpg" },
  ]},

  { categoria:"Cervezas", items:[
    { nombre:"Gallo", precio:28, desc:"Lager guatemalteca, bien fría.", img:"../IMG_PaginaWeb/IMG_Bebidas/Gallo.jpg" },
    { nombre:"Modelo Clara", precio:30, desc:"Lager mexicana, suave.", img:"../IMG_PaginaWeb/IMG_Bebidas/Modelo.jpg" },
    { nombre:"Stella Artois", precio:30, desc:"Premium lager belga.", img:"../IMG_PaginaWeb/IMG_Bebidas/Stella.jpg" },
    { nombre:"Corona", precio:30, desc:"Lager ligera y refrescante.", img:"../IMG_PaginaWeb/IMG_Bebidas/Corona.jpg" },
  ]},

  { categoria:"Licores", items:[
    { nombre:"JW etiqueta roja (Botella)", precio:490, desc:"Whisky escocés, blend clásico.", img:"../IMG_PaginaWeb/IMG_Bebidas/JwRoja.jpg" },
    { nombre:"JW etiqueta negra (Botella)", precio:1090, desc:"Whisky 12 años, ahumado suave.", img:"../IMG_PaginaWeb/IMG_Bebidas/JwNegra.jpg" },
    { nombre:"Jack Daniel's (Botella)", precio:700, desc:"Tennessee whiskey, notas de vainilla.", img:"../IMG_PaginaWeb/IMG_Bebidas/Jack.jpg" },
    { nombre:"Buchanan's 12 (Botella)", precio:1290, desc:"Whisky 12 años, balanceado.", img:"../IMG_PaginaWeb/IMG_Bebidas/Buchana.jpg" },
  ]},

  { categoria:"Vinos", items:[
    { nombre:"Copa tinto de la casa", precio:45, desc:"Cuerpo medio, afrutado.", img:"../IMG_PaginaWeb/IMG_Bebidas/VinoTinto.jpg" },
    { nombre:"Copa blanco de la casa", precio:45, desc:"Fresco, notas cítricas.", img:"../IMG_PaginaWeb/IMG_Bebidas/VinoBlanco.jpg" },
  ]},
];


// ====== RENDER ======
(function(){
  const data = BONANZA_BEBIDAS.filter(c => Array.isArray(c.items));
  const $grid = document.getElementById('menuGrid');
  const $cat  = document.getElementById('menuCategory');
  const $q    = document.getElementById('menuSearch');

  // --- Categorías únicas
  const categorias = [...new Set(data.map(c => c.categoria))];
  $cat.innerHTML = '<option value="__ALL__">Todas las categorías</option>';
  categorias.forEach(c => {
    const opt = document.createElement('option');
    opt.value = c;
    opt.textContent = c;
    $cat.appendChild(opt);
  });

  const qtz = n => `Q${Number(n).toLocaleString('es-GT')}`;

  function card(it){
    const alt = it.nombre || "Bebida";
    const img = it.img || "../IMG_PaginaWeb/placeholder.jpg";
    return `
      <article class="card card--menu" aria-label="${alt}">
        <div class="card__media"><img src="${img}" alt="${alt}"></div>
        <div class="card__body">
          <div class="card__head">
            <h3 class="card__title">${it.nombre}</h3>
          </div>
          <p class="card__desc">${it.desc || ""}</p>

          <!-- Footer con estilo elegante -->
          <div class="card__footer">
            <span class="chip">${it.categoria}</span>
            <span class="price-chip"><span class="label">Precio</span> ${qtz(it.precio)}</span>
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
        // 🔍 Búsqueda solo por nombre
        if (!term || hay.includes(term)) {
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
