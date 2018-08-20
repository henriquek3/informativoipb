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
    .sass('resources/assets/sass/app.scss', 'public/css');

/*
 *    JS
 */
mix.copy('node_modules/jquery-mask-plugin/dist/jquery.mask.min.js',
    'public/js/plugins/');

mix.copy('node_modules/gerador-validador-cpf/dist/js/CPF.js',
    'public/js/plugins/');


/*
 *   BrowserSync
 */
mix.browserSync('http://localhost:8000');
mix.browserSync({
    proxy: 'http://localhost:8000'
});
