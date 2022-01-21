const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans],
      },
    },
    colors: {
      green: colors.emerald,
      purple: colors.violet,
      yellow: colors.amber,
      gray: colors.gray,
      white: colors.white,
      red: colors.red,
    }
  },
  plugins: [require('@tailwindcss/forms')],
};
