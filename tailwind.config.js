module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    safelist: [
        {
            pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
            variants: ['sm', 'md', 'lg', 'xl', '2xl'],
        },
    ],
    theme: {
        extend: {
            colors: {
                primary: '#5A67D8',
            },
            textColors: {
                primary: '#5A67D8'
            },
            backgroundImage:{
                'header-clinic': "url('../../public/imgs/banner1_070152.jpg')",
            }
        },
    },
    plugins: [
        require('@tailwindcss/typography')
    ],
};