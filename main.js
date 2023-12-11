'use strict';

//////////// NAV //////////////
const hamburger = document.getElementById('hamburger');
const nav = document.getElementById('nav');
const header = document.getElementById('header');
const closeNavButton = document.getElementById('close-nav-button');

if (hamburger) {
  hamburger.addEventListener('click', () => {
    nav.classList.toggle('hidden');
    header.classList.toggle('px-[5vw]');
  });
}
if (closeNavButton) {
  nav.addEventListener('click', () => {
    nav.classList.toggle('hidden');
    header.classList.toggle('px-[5vw]');
  });
}

//////////// SLIDER ////////////
const slider = document.getElementById('slider');
const slides = Array.from(document.querySelectorAll('.slide'));
const slideForward = document.getElementById('slide-forward');
const slideBackward = document.getElementById('slide-backward');
const dots = document.getElementById('dots');

function isInViewport(element) {
  const rect = element.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <=
      (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}
const debounce = (callback, wait) => {
  let timeoutId = null;
  return (...args) => {
    window.clearTimeout(timeoutId);
    timeoutId = window.setTimeout(() => {
      callback.apply(null, args);
    }, wait);
  };
};

function initDots() {
  slides.forEach((_, i) => {
    dots.insertAdjacentHTML(
      'afterbegin',
      `<div class="h-4 w-4 rounded-full border-2"></div>`
    );
  });
  dots.firstChild.classList.add('bg-white');
}

function slide(direction) {
  let scrollPosition;
  const { scrollLeft, clientWidth } = slider;

  switch (direction) {
    case 'prev':
      scrollPosition = scrollLeft - clientWidth;
      break;
    case 'next':
    default:
      scrollPosition = scrollLeft + clientWidth;
      break;
  }

  slider.scrollTo({
    left: scrollPosition,
    behavior: 'smooth',
  });
}

const updateDots = debounce((ev) => {
  slides.forEach((el, i) => {
    const currentDot = dots.children[i];
    if (isInViewport(el)) {
      currentDot.classList.add('bg-white');
    }
    if (!isInViewport(el) && currentDot.classList.contains('bg-white')) {
      currentDot.classList.remove('bg-white');
    }
  });
}, 100);

if (slider) {
  slider.addEventListener('scroll', () => updateDots());
  slideBackward.addEventListener('click', () => slide('prev'));
  slideForward.addEventListener('click', () => slide('next'));

  initDots();
}
