const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/admin/js')

mix.styles(['resources/mix/css/dropzone.min.css'],'public/admin/css/dropzone.min.css')
   .js(['resources/mix/js/dropzone.min.js'],'public/admin/js/dropzone.min.js');
