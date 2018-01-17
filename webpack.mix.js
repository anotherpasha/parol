let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
	.js('resources/assets/js/contact.js', 'public/js')
	.js('resources/assets/js/contact-us.js', 'public/js')
	.js('resources/assets/js/calculator.js', 'public/js')
    .js('resources/assets/js/dashboard.js', 'public/js')
    .js('resources/assets/js/product.js', 'public/js')
    .js('resources/assets/js/media.js', 'public/js')
    .sass('resources/assets/sass/wysiwyg.scss', 'public/css')
    .sass('resources/assets/sass/style.scss', 'public/css');
