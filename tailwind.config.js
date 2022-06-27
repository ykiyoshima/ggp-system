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
        'gs': '#76C8E8',
        'hover-gs': '#00A7EA',
      },
    },
  },
  plugins: [],
}
