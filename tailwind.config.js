/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.{html,js,php}'],
  theme: {
    extend: {
      colors: {
        primary: 'var(--primary)',
        secondary: 'var(--secondary)',
      },
    },
    fontFamily: {
      serif: ['Lusitana', 'ui-serif'],
      sans: ['Signika', 'ui-sans-serif'],
      negative: ['Signika Negative', 'ui-sans-serif'],
    },
  },
  plugins: [],
};
