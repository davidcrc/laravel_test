<?php

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

// Video 06: PagesController@home (en / y /acerca)
Route::get('/', "PagesController@home");

// video 11: Traer un mensaje en recorrido completo
Route::get('/messages/{message}','MessagesController@show');

// Video 12: datos que se enviaran de formularios a:
Route::post('/messages/create','MessagesController@create')->middleware('auth');    //Video 18: antes del controler, chekar el login de usuario
//          y seran guardados en la BD

// Video 16: agregado por auth
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// Video 19: Para mostrar los mensajes de un usuario (crear UsersController)
Route::get('/{username}','UsersController@show');

// Video 20: A quien sigue el usuario
Route::get('/{username}/follows','UsersController@follows');
//      para seguir a un usuario
Route::get('/{username}/follow','UsersController@follow');     //post ??

// Video 21: Dejar de seguir
Route::get('/{username}/unfollow','UsersController@unfollow'); //post ??
Route::get('/{username}/followers','UsersController@followers'); //post ??


