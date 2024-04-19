/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'biru' : '#6A8BFF',
        'hijau' : '#77CA6A',
      }
    },
  },
  plugins: [],
}

