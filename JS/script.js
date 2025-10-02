// Año dinámico
document.getElementById('y').textContent = new Date().getFullYear();

// Carousel 3D
const carousel = document.getElementById('carousel');
const slides = [...carousel.querySelectorAll('.slide')];
const dotsWrap = document.getElementById('dots');

const n = slides.length;
const step = 360 / n;
const radius = 420;
let index = 0;
let autoTimer = null;

// Posicionar en círculo
slides.forEach((s, i) => {
  const angle = step * i;
  s.style.transform = `rotateY(${angle}deg) translateZ(${radius}px)`;
  const d = document.createElement('button');
  d.className = 'dot';
  d.addEventListener('click', () => goTo(i));
  dotsWrap.appendChild(d);
});
const dots = [...dotsWrap.children];

function render() {
  const rot = -index * step;
  carousel.style.transform = `translateZ(-120px) rotateY(${rot}deg)`;
  dots.forEach((d, i) => d.classList.toggle('active', i === index));
}
function goTo(i) {
  index = (i + n) % n;
  render();
  restartAuto();
}
function next() { goTo(index + 1); }

// Auto cada 5s
function restartAuto() {
  clearInterval(autoTimer);
  autoTimer = setInterval(next, 5000);
}
restartAuto();
render();
