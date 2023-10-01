const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/frontend/*.blade.php',
        './resources/views/frontend/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#1B98F5',
                'secondary': '#F66962',
                "border__primary": "#eeeeee",

            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
