const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
.combine([
'resources/js/bootstrap.js',
'resources/js/main.js',
'resources/js/plugins/countdown.min.js',
'resources/js/plugins/image-zoom.min.js',
'resources/js/plugins/imagesloaded.pkgd.min.js',
'resources/js/plugins/jqueryui.min.js',
'resources/js/plugins/nice-select.min.js',
'resources/js/plugins/slick.min.js',
'resources/js/vendor/bootstrap.bundle.min.js',
'resources/js/vendor/jquery-3.6.0.min.js',
'resources/js/vendor/modernizr-3.6.0.min.js'], 'public/js/all.js'
).combine([
  'resources/css/plugins/animate.css',
  'resources/css/plugins/jqueryui.min.css',
  'resources/css/plugins/nice-select.css',
  'resources/css/plugins/slick.min.css',
  'resources/css/vendor/bootstrap.min.css',
  'resources/css/vendor/font-awesome.min.css',
  'resources/css/main.css',
  'resources/css/preload.css',
  'resources/css/style.css'],'public/css/all.css'
);
