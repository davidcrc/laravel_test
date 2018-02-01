<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Video 06 : Controlador , home() , about()
// Video 08 : Pasa un array de imagenes, que se recibe en welcome
//          con un forelse se recorre las imgsen divs de bootstrap

class PagesController extends Controller
{
    public function home(){ // enviar un array con imagenes aleatorias
        
        $messages = [
           [
            'id '=> 1,
            'content' => 'Mi primer mensaje',
            'image' => 'http://lorempixel.com/600/338?1',

           ],
           [
            'id '=> 2,
            'content' => 'Mi segundo mensaje',
            'image' => 'http://lorempixel.com/600/338?2',

           ],
           [
            'id '=> 3,
            'content' => 'Mi tercer mensaje',
            'image' => 'http://lorempixel.com/600/338?3',

           ],
           [
            'id '=> 4,
            'content' => 'Mi cuarto mensaje',
            'image' => 'http://lorempixel.com/600/338?4',

           ],
        ];
    
        return view('welcome', [
            'messages' => $messages,
        ]);
    }

    public function xxx(){

    }
}
