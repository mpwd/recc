/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.{html,js,php}'],
  safelist: [
    'absolute',
    'body-link',
    'flex',
    'flex-col',
    'flex-row',
    'flex-col-reverse',
    'flex-grow-lg',
    'items-center',
    'justify-center',
    'slider-link',
    'gap-8',
    'gap-10',
    'mb-0',
    'mb-4',
    'mb-12',
    'bg-transparent',
    'bg-secondary',
    'bg-white',
    'w-screen',
    'date-icon-light',
    'date-icon-dark',
    'spotlight-1',
    'spotlight-2',
    'farmers-market',
    'other-churches',
    'homepage-columns',
    'staff-pic',
    'w-40',
    'max-[782px]:justify-center',
    'max-w-[259px]',
    '[&_a]:bg-primary',
    '[&_a]:body-link',
  ],
  theme: {
    extend: {
      colors: {
        primary: 'var(--primary)',
        secondary: 'var(--secondary)',
        opaqueSecondary: 'var(--opaque-secondary)',
        button: 'var(--button)',
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
