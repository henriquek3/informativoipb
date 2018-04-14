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
Route::get('/login', 'UserController@index');
Route::get('/pre-login', 'UserController@prelogin');


Route::post('/api/connect', 'UserController@connect');
Route::get('/teste', 'UserController@teste');
Route::get('/teste', 'UserController@teste');