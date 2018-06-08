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
   .sass('resources/assets/sass/app.scss', 'public/css')
   .copyDirectory('node_modules/feather-icons', 'public/feather-icons')
   .copyDirectory('node_modules/bootstrap', 'public/bootstrap')
   .copyDirectory('node_modules/jquery', 'public/jquery')
   .copyDirectory('node_modules/popper.js', 'public/popper.js');

   if (mix.inProduction()) {
      mix.version();
    }
