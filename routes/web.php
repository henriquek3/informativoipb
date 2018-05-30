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
Route::get('/testdb', function(){
    Artisan::call('migrate');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/inicio', 'HomeController@index')->name('home');

Route::get('/mail', function () {
    /*Mail::send('mail', [], function ($m) {
        $m->from('hello@app.com', 'YOUR APP');
        $m->to('henriquek3@live.com', 'Jean Freitas')->subject('Hellooo Worrdll!');
    });*/

    return view('mail');

});

Route::get('/rotas', 'TesteController@index');


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

/*
|--------------------------------------------------------------------------
| Web Routes SinodoController
|--------------------------------------------------------------------------
*/
Route::get('/cadastros-sinodos', 'SinodoController@index');
Route::get('/api/sinodos', 'SinodoController@api');
Route::post('/api/sinodos/store', 'SinodoController@store');
Route::put('/api/sinodos/update', 'SinodoController@update');
Route::delete('/api/sinodos/delete', 'SinodoController@destroy');


/*
|--------------------------------------------------------------------------
| Web Routes PresbiterioController
|--------------------------------------------------------------------------
*/
Route::get('/cadastros-presbiterios', 'PresbiterioController@index');
Route::get('/api/presbiterios', 'PresbiterioController@api');
Route::post('/api/presbiterios/store', 'PresbiterioController@store');
Route::put('/api/presbiterios/update', 'PresbiterioController@update');
Route::delete('/api/presbiterios/delete', 'PresbiterioController@destroy');


/*
|--------------------------------------------------------------------------
| Web Routes IgrejaController
|--------------------------------------------------------------------------
*/
Route::get('/cadastros-igrejas', 'IgrejaController@index');
Route::get('/api/igrejas', 'IgrejaController@api');
Route::post('/api/igrejas/store', 'IgrejaController@store');
Route::put('/api/igrejas/update', 'IgrejaController@update');
Route::delete('/api/igrejas/delete', 'IgrejaController@destroy');

/*
|--------------------------------------------------------------------------
| Web Routes IgrejaCongregacaoController
|--------------------------------------------------------------------------
*/
Route::get('/cadastros-congregacoes', 'IgrejaCongregacaoController@index');
Route::get('/api/congregacoes', 'IgrejaCongregacaoController@api');
Route::post('/api/congregacoes/store', 'IgrejaCongregacaoController@store');
Route::put('/api/congregacoes/update', 'IgrejaCongregacaoController@update');
Route::delete('/api/congregacoes/delete', 'IgrejaCongregacaoController@destroy');

/*
|--------------------------------------------------------------------------
| Web Routes PresbiteroController
|--------------------------------------------------------------------------
*/
Route::get('/cadastros-ministros', 'PresbiteroController@index');
Route::get('/api/presbiteros', 'PresbiteroController@api');
Route::post('/api/presbiteros/store', 'PresbiteroController@store');
Route::put('/api/presbiteros/update', 'PresbiteroController@update');
Route::delete('/api/presbiteros/delete', 'PresbiteroController@destroy');


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