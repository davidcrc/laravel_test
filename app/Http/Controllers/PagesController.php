<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Video 06 : Controlador , home() , about()

class PagesController extends Controller
{
    public function home(){
    $links = [
        'https://www.platzi.com/laravel' => 'Curo de laravel',
        'https://laravel.com' => 'Pagina de laravel'
    ];
    
    return view('welcome', [
        'linkss' => $links,
        'teacher' => 'Un profesor X',
    ]);
    }

    public function about(){

    }
}
