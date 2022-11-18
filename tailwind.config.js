const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
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
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                'white': '#ffffff',
                'sky':{
                    400:"#fff",
                    500:"#FEB81C"
                },
                'rose':{
                    500:"#f43f5e",
                    600:"#e11d48"
                }
            },
            borderColor:{
                'indigo':{
                    400:'#FEB81C'
                }
            },
            maxWidth: {
                '.5': '.5rem',
                '.8': '.8rem',
                '1': '1rem',
                '2': '2rem',
                '3': '3rem',
                '4': '4rem',
                '5': '5rem',
                '6': '6rem',
                '7': '7rem',
                '8': '8rem',
                '9': '9rem',
                '10': '10rem',
                '11': '11rem',
                '12': '12rem',
                '13': '13rem',
                '14': '14rem',
                '15': '15rem',
                '16': '16rem',
                '17': '17rem',
                '18': '18rem',
                '19': '19rem',
                '20': '20rem',
                '21': '21rem',
                '22': '22rem',
                '23': '23rem',
              },
            fontSize: {
                'xs': '.75rem',
                'sm': '.875rem',
                'tiny': '.875rem',
                'base': '1rem',
                'lg': '1.125rem',
                'xl': '1.25rem',
                '2xl': '1.5rem',
                '3xl': '1.875rem',
                '4xl': '2.25rem',
                '5xl': '3rem',
                '6xl': '4rem',
                '7xl': '5rem',
              },
              inset: {
                '-10px': '-10px',
              }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};