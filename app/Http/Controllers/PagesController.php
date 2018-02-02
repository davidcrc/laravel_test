<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

// Video 06 : Controlador , home() , about()
// Video 08 : Pasa un array de imagenes, que se recibe en welcome
//          con un forelse se recorre las imgsen divs de bootstrap

// Video 10 : El modelo Message que se crea con model, nos devuelve
//          datos de la BD para poder mostrarlos
// HELP : dd($messages) -> muestra todo el contenido en el navegador

// Video 19: Al paginar ordenar por fecha de creacion

class PagesController extends Controller
{
    public function home(){ // enviar un array con imagenes aleatorias
        
        // $messages = Message::all();
        $messages = Message::latest()->paginate(6);       //para paginar
        
        return view('welcome', [
            'messages' => $messages,
        ]);
    }

    public function xxx(){

    }
}
