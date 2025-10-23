// ====== Carrusel 3D ======
  const carousel = document.getElementById('carousel3d');
  const viewport = document.getElementById('carouselViewport');
  const cards = [...carousel.querySelectorAll('.card3d')];
  const dotsWrap = document.getElementById('dots');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');

  let index = 0;
  const n = cards.length;
  const step = 360 / n;
  let auto = null;
  const AUTOSPEED = 5000; // 5 segundos

  // Posiciona las tarjetas en el anillo
  function layout() {
    const radius = getComputedStyle(document.documentElement).getPropertyValue('--carousel-radius') || '360px';
    cards.forEach((card, i) => {
      const angle = step * i;
      card.style.transform = `rotateY(${angle}deg) translateZ(${radius})`;
    });
  }

  // Dots
  function buildDots(){
    dotsWrap.innerHTML = '';
    for (let i=0; i<n; i++){
      const b = document.createElement('button');
      b.className = 'dot';
      b.setAttribute('aria-label', `Ir a postre ${i+1}`);
      b.addEventListener('click', () => goTo(i));
      dotsWrap.appendChild(b);
    }
  }

  function setActiveDot(){
    [...dotsWrap.children].forEach((d,i)=>{
      d.classList.toggle('active', i === index);
    });
  }

  function goTo(i){
    index = (i + n) % n;
    const rot = -index * step;
    carousel.style.transform = `translateZ(-1px) rotateY(${rot}deg)`; // Regreso a la primera
    setActiveDot();
  }

  function next(){ goTo(index+1); }
  function prev(){ goTo(index-1); }

  function autoplayStart(){
    stop(); auto = setInterval(next, AUTOSPEED);
  }
  function stop(){
    if(auto){ clearInterval(auto); auto = null; }
  }

  // Flechas para cambiar manualmente
  nextBtn.addEventListener('click', next);
  prevBtn.addEventListener('click', prev);
  viewport.addEventListener('mouseenter', stop);
  viewport.addEventListener('mouseleave', autoplayStart);
  // Accesibilidad con teclado
  window.addEventListener('keydown', (e)=>{
    if(e.key === 'ArrowRight') next();
    if(e.key === 'ArrowLeft')  prev();
  });

  // Init
  layout(); buildDots(); goTo(0); autoplayStart();