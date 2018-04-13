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

Route::get('/pre-login', 'UserController@prelogin');
Route::get('/login', 'UserController@index');
Route::get('/teste', 'UserController@teste');
//Route::post('/teste', 'UserController@store');
//Route::get('/api/connect', 'UserController@connect');
// http://localhost:8000/api/connect?email=jean@jean.com&password=123
Route::post('/teste', 'UserController@connect');