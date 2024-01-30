"use strict";

//////////// NAV //////////////
const hamburger = document.getElementById("hamburger");
const nav = document.getElementById("nav");
const header = document.getElementById("header");
const closeNavButton = document.getElementById("close-nav-button");

if (hamburger) {
  hamburger.addEventListener("click", () => {
    nav.classList.toggle("right-full");
  });
}
if (closeNavButton) {
  closeNavButton.addEventListener("click", () => {
    nav.classList.toggle("right-full");
  });
}

////////////////////////////////
//////////// SLIDER ////////////
////////////////////////////////
const slider = document.getElementById("slider");
const slides = Array.from(document.querySelectorAll(".slide"));
const slideForward = document.getElementById("slide-forward");
const slideBackward = document.getElementById("slide-backward");
const dots = document.getElementById("dots");

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
      "afterbegin",
      `<div class="h-4 w-4 rounded-full border-2"></div>`,
    );
  });
  dots.firstChild.classList.add("bg-white");
}

function slide(direction) {
  let scrollPosition;
  const { scrollLeft, clientWidth } = slider;

  switch (direction) {
    case "prev":
      scrollPosition = scrollLeft - clientWidth;
      break;
    case "next":
    default:
      scrollPosition = scrollLeft + clientWidth;
      break;
  }

  slider.scrollTo({
    left: scrollPosition,
    behavior: "smooth",
  });
}

const updateDots = debounce((ev) => {
  slides.forEach((el, i) => {
    const currentDot = dots.children[i];
    if (isInViewport(el)) {
      currentDot.classList.add("bg-white");
    }
    if (!isInViewport(el) && currentDot.classList.contains("bg-white")) {
      currentDot.classList.remove("bg-white");
    }
  });
}, 100);

if (slider) {
  slider.addEventListener("scroll", () => updateDots());
  slideBackward.addEventListener("click", () => slide("prev"));
  slideForward.addEventListener("click", () => slide("next"));

  initDots();
}

//////////////////////////////////////////
////////////// STAFF BIOS ////////////////
//////////////////////////////////////////
const staffArray = document.querySelectorAll(".staff-column");
const modals = document.querySelectorAll(".modal");
const closeBtns = document.querySelectorAll(".close-button");

modals.forEach((modal) =>
  modal.addEventListener("click", function(event) {
    var rect = modal.getBoundingClientRect();
    var isInDialog =
      rect.top <= event.clientY &&
      event.clientY <= rect.top + rect.height &&
      rect.left <= event.clientX &&
      event.clientX <= rect.left + rect.width;
    var closeBtn = modal.children[0];
    if (!isInDialog || event.target == closeBtn) {
      modal.close();
    }
  }),
);

staffArray.forEach((el, i) =>
  el.addEventListener("click", (e) => {
    if (e.target.closest("a")) {
      return;
    }
    modals[i].showModal();
  }),
);
closeBtns.forEach((btn) => btn.addEventListener("click", () => { }));

//////////////////////////////////////////////////////////////////
//////////////////  FARMERS MARKET SLIDER  ///////////////////////
//////////////////////////////////////////////////////////////////
if (window.location.pathname == "/our-community/farmers-market/") {
  const mainImg = document.querySelector("#carousel-image");
  setTimeout(() => {
    const thumbnails = Array.from(
      document.querySelectorAll("[data-swiper-slide-index]"),
    );
    for (let i = 0; i < thumbnails.length / 3; i++) {
      console.log(thumbnails[i].children[0].children[0].href);
    }
  }, 2000);
  // mainImg.src = thumbnails[0].children[0].src;
  // const urls = thumbnails.map((figure) => figure.children[0].src);
  // thumbnails.forEach((el) => {
  //   el.addEventListener('click', (e) => {
  //     mainImg.src = e.target.src;
  //   });
  // el.classList.add('size-thumbnail');
  // });
}

//////////////////////////////////////////////////////////////////
///////////////////    Church Directory    ///////////////////////
//////////////////////////////////////////////////////////////////
if (window.location.pathname == "/directory/") {
  const LETTERS = [
    "A",
    "B",
    "C",
    "D",
    "E",
    "F",
    "G",
    "H",
    "I",
    "J",
    "K",
    "L",
    "M",
    "N",
    "O",
    "P",
    "Q",
    "R",
    "S",
    "T",
    "U",
    "V",
    "W",
    "X",
    "Y",
    "Z",
  ];

  const output = [];

  for (let i = 0; i < LETTERS.length; i++) {
    const el = document.querySelector(`[data-first-character='${LETTERS[i]}']`);
    if (el) {
      output.push(el);
      el.insertAdjacentHTML(
        "afterbegin",
        `<h2 class="pt-4 mb-0" id="${el.dataset.firstCharacter}">${el.dataset.firstCharacter}</h2>`,
      );
    }
  }
  window.addEventListener("hashchange", () => {
    document.querySelector(".active-letter").classList.toggle("active-letter");
    document
      .getElementById(`sidebar-${window.location.hash}`)
      .classList.toggle("active-letter");
  });
}
