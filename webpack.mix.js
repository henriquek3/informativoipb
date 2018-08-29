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
    'public/js/plugins/')
    .copy('node_modules/gerador-validador-cpf/dist/js/CPF.js',
        'public/js/plugins/')
    .copy('node_modules/jquery-tablesort/jquery.tablesort.min.js',
        'public/js/plugins/')
;

/*mix.js([
    'resources/assets/js/app/administrar-usuarios.js',
    'resources/assets/js/app/cadastros-congregacoes.js',
    'resources/assets/js/app/cadastros-igrejas.js',
    'resources/assets/js/app/cadastros-presbiterios.js',
    'resources/assets/js/app/cadastros-presbiteros.js',
    'resources/assets/js/app/cadastros-sinodos.js',
    'resources/assets/js/app/consultar-estatisticas-presbiterio.js',
    'resources/assets/js/app/index.js',
    'resources/assets/js/app/jquery-validate.js',
    'resources/assets/js/app/login.js',
    'resources/assets/js/app/login-validator.js',
    'resources/assets/js/app/main.js',
    'resources/assets/js/app/meu-usuario.js',
    'resources/assets/js/app/pace.min.js',
    'resources/assets/js/app/regex-verify.js',
    'resources/assets/js/app/relatorios-conselhos.js',
    'resources/assets/js/app/relatorios-estatisticas.js',
    'resources/assets/js/app/relatorios-ministeriais.js',
    'resources/assets/js/app/reuniao-presbiterio.js'
    ],'public/js/app/all.js');*/

mix.copyDirectory('resources/assets/js/app', 'public/js/app');

/*
 *   BrowserSync
 */
mix.browserSync('http://localhost:8001');