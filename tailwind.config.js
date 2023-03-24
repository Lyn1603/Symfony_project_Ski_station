/** @type {import('tailwindcss').Config} */
const url = require("url");
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {


    },
  },
  plugins: [
      require('tw-elements/dist/plugin')
  ],
}
