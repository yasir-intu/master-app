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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
   
mix.scripts([
	'resources/js/app2.js'
	], 'public/contents/admin/assets/js/app.js');

mix.scripts([
	'resources/js/controllers/client-message-mdController.js',
	'resources/js/controllers/client-message-seController.js'
	], 'public/contents/admin/assets/js/controllers.js');
	
mix.version([
	'public/contents/admin/assets/js/app.js',
	'public/contents/admin/assets/js/controllers.js'
]);
