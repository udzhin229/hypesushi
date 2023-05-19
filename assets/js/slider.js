const carouselSlides = document.querySelector('.carousel_slides');
const carouselSlide = document.querySelectorAll('.carousel-slide');
const carouselDots = document.querySelectorAll('.dot');
const numberOfSlides = carouselSlide.length;
let slideWidth = carouselSlide[0].clientWidth;
let currentSlide = 0;
let targetSlide = 1;
let interval = null;

// устанавливаем ширину слайда в зависимости от ширины карусели
carouselSlides.style.width = `${numberOfSlides * 100}%`;
carouselSlide.forEach(slide => {
  slide.style.width = `${100 / numberOfSlides}%`;
});

// устанавливаем обработчики событий на точки
carouselDots.forEach((dot, index) => {
  dot.addEventListener('click', () => {
    targetSlide = index;
    clearInterval(interval);
    interval = setInterval(changeSlide, 10000);
    changeSlide();
  });
});

// функция для смены слайда
function changeSlide() {
  // проверяем, что не выходим за границы карусели
  if (targetSlide < 0) {
    targetSlide = numberOfSlides - 1;
  } else if (targetSlide > numberOfSlides - 1) {
    targetSlide = 0;
  }
  
  // сдвигаем карусель на новый слайд
  carouselSlides.style.transform = `translateX(-${targetSlide * slideWidth}px)`;

  // обновляем активную точку
  carouselDots[currentSlide].classList.remove('active');
  carouselDots[targetSlide].classList.add('active');
  // обновляем текущий слайд
currentSlide = targetSlide;
targetSlide++;

// проверяем, что не выходим за границы карусели
if (targetSlide > numberOfSlides - 1) {
targetSlide = 0;
}
}

// устанавливаем интервал для автоматической смены слайдов
interval = setInterval(changeSlide, 10000);