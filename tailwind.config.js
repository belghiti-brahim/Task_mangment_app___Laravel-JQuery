const { orange } = require('tailwindcss/colors');
const colors = require('tailwindcss/colors')

const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
                Catamaran: ['Catamaran', "sans-serif"],
                // sans: ['Montserrat, "sans-serif'],
            },
            height: {
                "89": "89px",
                "144": "144px",
                "610": '610px',
                "987": '987px',
                "756": '756px',
            },
           
        },
        colors:{
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gray: colors.gray,
            emerald: colors.emerald,
            indigo: colors.indigo,
            yellow: colors.yellow,
            sky: colors.sky,
            orange: colors.orange,
            pink: colors.pink,
            red: colors.red,
            cyan: colors.cyan,
            lime:colors.lime,
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
