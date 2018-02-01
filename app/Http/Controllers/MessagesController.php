<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function show(Message $message){      //antes: ($id)
        
        // Ir a buscar el Mesage por ID , a traves del modelo Message
        // $message = Message::find($id);

        // Retornarlo a la vista
        return view('messages.show',['message' => $message]);
    }

    // video 11: recibe datos de otra pagina
    public function create(Request $request){       // le pdemos un request object
        return 'creado';
    }
}
