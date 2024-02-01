/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,js,php}"],
  safelist: [
    "absolute",
    "body-link",
    "cursor-pointer",
    "flex",
    "flex-col",
    "flex-row",
    "flex-col-reverse",
    "flex-grow-lg",
    "items-center",
    "justify-center",
    "slider-link",
    "gap-8",
    "gap-10",
    "m-0",
    "mb-0",
    "mb-4",
    "mb-12",
    "pt-4",
    "py-4",
    "about-us-card",
    "bg-transparent",
    "bg-secondary",
    "bg-white",
    "w-screen",
    "date-icon-light",
    "date-icon-dark",
    "spotlight-1",
    "spotlight-2",
    "farmers-market",
    "other-churches",
    "homepage-columns",
    "staff-pic",
    "staff-info",
    "staff-columns",
    "w-40",
    "max-w-[20ch]",
    "max-[782px]:justify-center",
    "max-w-[259px]",
    "max-w-7xl",
    "[&_a]:bg-button",
    "[&_a]:body-link",
    "wp-element-button",
    "sticky-video",
    "persons-container",
    "card-address",
    "letters-column",
  ],
  theme: {
    extend: {
      colors: {
        opaqueBlack: "var(--opaque-black)",
        primary: "var(--primary)",
        secondary: "var(--secondary)",
        opaqueSecondary: "var(--opaque-secondary)",
        button: "var(--button)",
      },
    },
    fontFamily: {
      serif: ["Lusitana", "ui-serif"],
      sans: ["Signika", "ui-sans-serif"],
      negative: ["Signika Negative", "ui-sans-serif"],
    },
  },
  plugins: [],
};
