const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary' : '#3AA6A7',
                'gray-primary': '#EBEAF3'
            },
            lineHeight: {
                '14': '3.5rem'
            },
            zIndex: {
                '100': '100'
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
