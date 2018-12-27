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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
   'resources/js/jquery.js',
   'resources/js/popper.min.js',
   'resources/js/bootstrap.js',
   'resources/js/dataTables.responsive.js',
   'resources/js/DataTablesBT4.js',
   'resources/js/JdDataTables.js',
   'resources/js/responsive.bootstrap4.js',
   'resources/js/table-datatable.js',
   'resources/js/front.js',
], 
'public/js/app.js');

mix.styles([
   'public/css/bootstrap.css',
   'public/css/font-awesom.min.css',
   'public/css/style.default.premium.css',
   'public/css/style.violet.premium.css',
], 
'public/css/app.css');