'use strict';

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
