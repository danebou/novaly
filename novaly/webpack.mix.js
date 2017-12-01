let js = 'public/js';
let css = 'public/css'

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

mix.js([
    'resources/assets/js/app.js',
    'bower_components/bootstrap-rating-input/src/bootstrap-rating-input.js'
], js + '/app.js');

mix.sass('resources/assets/sass/app.scss', css);
