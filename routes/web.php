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

Route::get('/', function () {
    // Video 05 :
    $links = [
        'https://www.platzi.com/laravel' => 'Curo de laravel',
        'https://laravel.com' => 'Pagina de laravel'
    ];
    
    return view('welcome', [
        'linkss' => $links,
        'teacher' => 'Un profesor X',
    ]);
});

Route::get('/id', function ($id) {
    
});