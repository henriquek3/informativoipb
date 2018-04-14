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
Route::get('/api/usuarios', 'UserController@usuarios');
Route::get('/api/usuarios/{id}/edit', 'UserController@edit');
Route::put('/api/usuarios/{id}/edit', 'UserController@update');


/**
 * +++++++++++++++++++++++++++++++++
 */
Route::get('/teste', 'UserController@teste');