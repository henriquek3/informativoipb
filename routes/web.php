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

Auth::routes();

Route::get('/welcome', 'HomeController@welcome')->name('welcome');
Route::get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Web Routes UserController
|--------------------------------------------------------------------------
*/

Route::get('/administrar-usuarios', 'UserController@adminuser')->middleware('auth');
Route::post('/api/usuarios', 'UserController@store')->middleware('auth');
Route::delete('/administrar-usuarios/{id}/delete', 'UserController@destroy')->middleware('auth');

Route::get('/api/usuarios', 'UserController@users')->middleware('auth');
Route::get('/api/usuarios/{id}/edit', 'UserController@edit')->middleware('auth');
Route::put('/api/usuarios/{id}/edit', 'UserController@update')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Web Routes UserController
|--------------------------------------------------------------------------
*/

Route::get('/meu-usuario', 'UserController@adminuser')->middleware('auth');
//Route::post('/api/usuarios', 'UserController@store');
//Route::delete('/api/usuarios/{id}', 'UserController@destroy');
//Route::get('/api/usuarios', 'UserController@users');
Route::get('/api/usuarios/{id}/edit', 'UserController@edit')->middleware('auth');
Route::put('/api/usuarios/{id}/edit', 'UserController@update')->middleware('auth');

Route::prefix('cadastros')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Web Routes SinodoController
    |--------------------------------------------------------------------------
    */
    Route::get('/sinodos', 'SinodoController@index');
    Route::get('/sinodos/novo', 'SinodoController@create');
    Route::post('/sinodos/novo', 'SinodoController@store');
    Route::get('/sinodos/{id}/editar', 'SinodoController@edit')->where(['id' => '[0-9]+']);
    Route::put('/sinodos/{id}/editar', 'SinodoController@update')->where(['id' => '[0-9]+']);
    Route::delete('/sinodos/{id}/editar', 'SinodoController@destroy')->where(['id' => '[0-9]+']);
    /*
    |--------------------------------------------------------------------------
    | Web Routes PresbiterioController
    |--------------------------------------------------------------------------
    */
    Route::get('/presbiterios', 'PresbiterioController@index');
    Route::get('/presbiterios/novo', 'PresbiterioController@create');
    Route::post('/presbiterios/novo', 'PresbiterioController@store');
    Route::get('/presbiterios/{id}/editar', 'PresbiterioController@edit')->where(['id' => '[0-9]+']);
    Route::put('/presbiterios/{id}/editar', 'PresbiterioController@update')->where(['id' => '[0-9]+']);
    Route::delete('/presbiterios/{id}/editar', 'PresbiterioController@destroy')->where(['id' => '[0-9]+']);
    /*
    |--------------------------------------------------------------------------
    | Web Routes IgrejaController
    |--------------------------------------------------------------------------
    */
    Route::get('/igrejas', 'IgrejaController@index');
    Route::get('/igrejas/novo', 'IgrejaController@create');
    Route::post('/igrejas/novo', 'IgrejaController@store');
    Route::get('/igrejas/{id}/editar', 'IgrejaController@edit')->where(['id' => '[0-9]+']);
    Route::put('/igrejas/{id}/editar', 'IgrejaController@update')->where(['id' => '[0-9]+']);
    Route::delete('/igrejas/{id}/editar', 'IgrejaController@destroy')->where(['id' => '[0-9]+']);
    /*
    |--------------------------------------------------------------------------
    | Web Routes IgrejaCongregacaoController
    |--------------------------------------------------------------------------
    */
    Route::get('/igrejas/{id}/congregacoes/novo', 'IgrejaCongregacaoController@create')->where(['id' => '[0-9]+']);
    Route::get('/congregacoes/{id}/editar', 'IgrejaCongregacaoController@edit')->where(['id' => '[0-9]+']);
    Route::put('/congregacoes/{id}/editar', 'IgrejaCongregacaoController@update')->where(['id' => '[0-9]+']);
    Route::delete('/congregacoes/{id}/editar', 'IgrejaCongregacaoController@destroy')->where(['id' => '[0-9]+']);

    /*
    |--------------------------------------------------------------------------
    | Web Routes PresbiteroController
    |--------------------------------------------------------------------------
    */
    Route::get('/ministros', 'PresbiteroController@index');
    Route::get('/ministros/novo', 'PresbiteroController@create');
    Route::post('/ministros/novo', 'PresbiteroController@store');
    Route::get('/ministros/{id}/editar', 'PresbiteroController@edit')->where(['id' => '[0-9]+']);
    Route::put('/ministros/{id}/editar', 'PresbiteroController@update')->where(['id' => '[0-9]+']);
    Route::delete('/ministros/{id}/editar', 'PresbiteroController@destroy')->where(['id' => '[0-9]+']);
});


/*
|--------------------------------------------------------------------------
| Web Routes RelConselhoController
|--------------------------------------------------------------------------
*/
Route::get('/relatorios-conselhos', 'RelConselhoController@index');
Route::get('/api/relconselhos', 'RelConselhoController@api');
Route::post('/api/relconselhos/store', 'RelConselhoController@store');
Route::put('/api/relconselhos/update', 'RelConselhoController@update');
Route::delete('/api/relconselhos/delete', 'RelConselhoController@destroy');

/*
|--------------------------------------------------------------------------
| Web Routes RelMinistroController
|--------------------------------------------------------------------------
*/
Route::get('/relatorios-ministeriais', 'RelMinistroController@index');
Route::get('/api/relministeriais', 'RelMinistroController@api');
Route::post('/api/relministeriais/store', 'RelMinistroController@store');
Route::put('/api/relministeriais/update', 'RelMinistroController@update');
Route::delete('/api/relministeriais/delete', 'RelMinistroController@destroy');


/*
|--------------------------------------------------------------------------
| Web Routes RelEstatisticaController
|--------------------------------------------------------------------------
*/
Route::get('/relatorios-estatisticas', 'RelEstatisticaController@index');
Route::get('/api/relestatisticas', 'RelEstatisticaController@api');
Route::post('/api/relestatisticas/store', 'RelEstatisticaController@store');
Route::put('/api/relestatisticas/update', 'RelEstatisticaController@update');
Route::delete('/api/relestatisticas/delete', 'RelEstatisticaController@destroy');

/*
|--------------------------------------------------------------------------
| Web Routes EstadoController
|--------------------------------------------------------------------------
*/
Route::get('/api/estados', 'EstadoController@api');

/*
|--------------------------------------------------------------------------
| Web Routes CidadeController
|--------------------------------------------------------------------------
*/
Route::get('/api/cidades', 'CidadeController@api');

Route::get('/api/sinodos', 'SinodoController@api');
Route::get('/api/presbiterios', 'PresbiterioController@api');
Route::get('/api/igrejas', 'IgrejaController@api');
Route::get('/api/ministros', 'PresbiteroController@api');