<?php /** @noinspection PhpUndefinedClassInspection */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/inicio', function () {
    return view('index');
});


/*
|--------------------------------------------------------------------------
| Web Routes UserController
|--------------------------------------------------------------------------
*/
Route::get('/pre-login', 'UserController@prelogin');
Route::get('/login', 'UserController@index');
Route::post('/api/connect', 'UserController@connect');

Route::get('/administrar-usuarios', 'UserController@adminuser');
Route::post('/api/usuarios', 'UserController@store');
Route::delete('/api/usuarios/{id}', 'UserController@destroy');

Route::get('/api/usuarios', 'UserController@users');
Route::get('/api/usuarios/{id}/edit', 'UserController@edit');
Route::put('/api/usuarios/{id}/edit', 'UserController@update');

/*
|--------------------------------------------------------------------------
| Web Routes SinodoController
|--------------------------------------------------------------------------
*/
Route::get('/cadastros-sinodos', 'SinodoController@index');


/*
|--------------------------------------------------------------------------
| Web Routes PresbiterioController
|--------------------------------------------------------------------------
*/
Route::get('/cadastros-presbiterios', 'PresbiterioController@index');


/*
|--------------------------------------------------------------------------
| Web Routes IgrejaController
|--------------------------------------------------------------------------
*/
Route::get('/cadastros-igrejas', 'IgrejaController@index');


/*
|--------------------------------------------------------------------------
| Web Routes PresbiteroController
|--------------------------------------------------------------------------
*/
Route::get('/cadastros-ministros', 'PresbiteroController@index');


/*
|--------------------------------------------------------------------------
| Web Routes RelConselhoController
|--------------------------------------------------------------------------
*/
Route::get('/relatorios-conselhos', 'RelConselhoController@index');

/*
|--------------------------------------------------------------------------
| Web Routes RelMinistroController
|--------------------------------------------------------------------------
*/
Route::get('/relatorios-ministeriais', 'RelMinistroController@index');


/*
|--------------------------------------------------------------------------
| Web Routes RelEstatisticaController
|--------------------------------------------------------------------------
*/
Route::get('/relatorios-estatisticas', 'RelEstatisticaController@index');


/**
 * +++++++++++++++++++++++++++++++++
 */
Route::get('/teste', 'UserController@teste');