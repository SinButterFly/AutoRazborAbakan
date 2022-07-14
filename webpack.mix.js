const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/style.sass', 'public/css')
    .sass('resources/sass/variables.sass', 'public/css')
    .sass('resources/sass/reset.sass', 'public/css')
    .sass('resources/sass/product-page.sass', 'public/css')
    .sass('resources/sass/cart-page.sass', 'public/css')
    .sass('resources/sass/catalog.sass', 'public/css')
    .sass('resources/sass/brands_filter.sass', 'public/css')
    .sass('resources/sass/about_us.sass', 'public/css')
    .sass('resources/sass/footer.sass', 'public/css');
