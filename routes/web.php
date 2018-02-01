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
Route::post('/messages/create','MessagesController@create');
//          y seran guardados en la BD