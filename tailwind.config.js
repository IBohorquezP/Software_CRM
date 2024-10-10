/** @type {import('tailwindcss').Config} */
const { addIconSelectors } = require('@iconify/tailwind');
const { addDynamicIconSelectors } = require('@iconify/tailwind');
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./src/*.html"
  ],
  plugins: [
    // Iconify plugin, requires writing list of icon sets to load
    addIconSelectors(['mdi', 'mdi-light']),
    addDynamicIconSelectors(),
],
  theme: {
    extend: {
      colors:{
        'naranja-industrial': {
          '50': '#fffbeb',
          '100': '#fdf2c8',
          '200': '#fae48d',
          '300': '#f8d251',
          '400': '#f6be29',
          '500': '#f0a21c', //es el base
          '600': '#d4780b',
          '700': '#b0550d',
          '800': '#8f4111',
          '900': '#753612',
          '950': '#431a05',
        },
        'amarillo-industrial': {
          '50': '#fefce8',
          '100': '#fef9c3',
          '200': '#fef08a',
          '300': '#fce048',
          '400': '#f9ca0e', //base
          '500': '#e9b309',
          '600': '#c98a05',
          '700': '#a06208',
          '800': '#854d0e',
          '900': '#713f12',
          '950': '#422006',
        },
        'amarillo-pollo': {
          '50': '#fefbe8',
          '100': '#fff8c2',
          '200': '#ffee89',
          '300': '#ffdc44', //base
          '400': '#fdc712',
          '500': '#ecae06',
          '600': '#cc8502',
          '700': '#a35e05',
          '800': '#864a0d',
          '900': '#723c11',
          '950': '#431e05',
        },
        'gris-industrial': {
          '50': '#f7f7f7',
          '100': '#ededed',
          '200': '#dfdfdf',
          '300': '#c8c8c8',
          '400': '#b9b9b9', //gris palido
          '500': '#999999', //gris cemento
          '600': '#888888',
          '700': '#7b7b7b',
          '800': '#676767',
          '900': '#545454',
          '950': '#363636',
        },
        'gris-input': {
          '50': '#f7f7f7',
          '100': '#ededed',
          '200': '#d5d5d5', //base
          '300': '#c8c8c8',
          '400': '#adadad',
          '500': '#999999',
          '600': '#888888',
          '700': '#7b7b7b',
          '800': '#676767',
          '900': '#545454',
          '950': '#363636',
        },
        'amarillo-oscuro': {
          '50': '#f9faec',
          '100': '#eef2cf',
          '200': '#e3e7a1',
          '300': '#d6d96b',
          '400': '#cccb43',
          '500': '#bdb635',
          '600': '#a2932c',
          '700': '#826e26',
          '800': '#6d5a26',
          '900': '#5e4b25',
          '950': '#181208', //base
        }
      }
    },
  },
  plugins: [],
}