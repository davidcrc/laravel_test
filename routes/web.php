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

// Video 31: Controlador para la busqueda de mensajes
Route::get('/messages','MessagesController@search');
// ---
// Video 16: agregado por auth
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

// -----------------------------
// Video 22: Agregar autenticacion con Facebook
Route::get('/auth/facebook','SocialAuthController@facebook');
Route::get('/auth/facebook/callback','SocialAuthController@callback');
// Video 24: Registar con facebook
Route::get('/auth/facebook/register','SocialAuthController@register');
// -----------------------------

// Video 19: Para mostrar los mensajes de un usuario (crear UsersController)
Route::get('/{username}','UsersController@show');

// Video 20: A quien sigue el usuario
Route::get('/{username}/follows','UsersController@follows');
//      para seguir a un usuario
Route::get('/{username}/follow','UsersController@follow')->middleware('auth');     //post ??

// Video 21: Dejar de seguir
Route::get('/{username}/unfollow','UsersController@unfollow')->middleware('auth'); //post ??
Route::get('/{username}/followers','UsersController@followers'); //post ??

// Video 27: Controlador para el paso de mensajes
//  Aqui tmbn hizo una agrupacion* de middleware() | * Route::Group(['middleware'=> 'auth], function(){Aqui las rutas});
Route::post('/{username}/dms','UsersController@sendPrivateMessage')->middleware('auth');
Route::get('/conversations/{conversation}','UsersController@showConversation')->middleware('auth');

// Video 37: Rutas para mostrar las respuestas a los mensajes
Route::get('/api/messages/{message}/responses','MessagesController@responses');
