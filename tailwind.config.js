const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                roboto: ["Roboto Condensed", "sans-serif"],
            },
            width: {
                25          : '25px',
                30          : '30px',
                'boxed'     : '1140px',
            },
            height: {
                25: '25px',
                30: '30px',
                40: '40px',
                90: '90px',
                '50p': '50px',
                '80p': '80px',
                '100p': '100px',
                '120p': '120px',
                '200p': '200px',
                '250p': '250px',
                '300p': '300px',
                '400p': '400px',
                '500p': '500px',
                '650p': '650px',
            },
            minHeight: {
                '400p': '400px',
            },
            colors: {
                'deepblue': '#1C2334',
                'blue': '#273147',
                'softblue': '#7c859a',
                'red': '#CB1A2B',
                'black': '#1C2334',
                'gray': '#F5F5F7',
                'graytext': '#80838d',
                'bluetext': '#7c859a40',
                'white': '#fff',
                'lines': '#2b334a',
                'transparent': 'transparent',
                'primary': '#1ab394',
                'success': '#1c84c6',
                'info': '#23c6c8',
                'warning': '#f8ac59',
                'danger': '#ec4758',
            },
            maxWidth: {
                'boxed': '1140px',
            },
            fontSize: {
                '2x1': '2rem',
                '2x5': '2.3rem',
                '3x': '3rem',
                '3x5': '3.5rem',
                '4x': '4rem',
                '4x5': '4.5rem',
                '5xl': '5rem',
                '6xl': '6rem',
                '7xl': '7rem',
            }
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
