/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/wire-elements/modal/resources/views/*.blade.php',
    ],
    safelist: [
        {
            pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
            variants: ['sm', 'md', 'lg', 'xl', '2xl','3xl','4xl','5xl'],
        },
    ],
    theme: {
        extend: {
            colors: {
                'strong-blue' : '#002C52',
            },
            fontFamily : {
                montserrat_light : [ "'Montserrat-Light' , sans-serif" ],
                montserrat_regular : [ "'Montserrat-Regular' , sans-serif" ],
                ptserifreg : [ "'PTSerif-Regular',serif" ],
                ptserif: "'PTSerif-Bold',serif"
            },
            backgroundImage: {
                'main': "url('../../public/img/bg-main.jpg')",
            }
        },
        container: {
            screens: {
                '2xl': '1280px',
            },
        },
    },
  plugins: [],
}

