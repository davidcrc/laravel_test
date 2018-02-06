<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests\CreateMessageRequest;
use Illuminate\Http\Request;

// Video 13: Este controlador trae datos de welcome y los valida
//      para poder pasar a otra pagina que tambien recibe datos

// Video 18: Proteger para publicar solo usuarios logueados
//          pedir por un uaurio logueado
class MessagesController extends Controller
{
    public function show(Message $message){      //antes: ($id)
        
        // Ir a buscar el Mesage por ID , a traves del modelo Message
        // $message = Message::find($id);

        // Retornarlo a la vista
        return view('messages.show',['message' => $message]);
    }

    // video 11: recibe datos de otra pagina
    // public function create(Request $request){       // le pdemos un request object
    //     $this->validate($request, [
    //             'message' => ['required', 'max:160'],
    //         ],
    //         ['message.required' => "Favor ecribir un mensaje!!",
    //         'message.max' => "El mensaje no puede superar los 160 caracteres!"
    //         ]
    //     );
    //     return 'llego!!';
    // }
    public function create(CreateMessageRequest $request){  // ahora pide de CreateMessageRequest
        
        // obtener el usuario logueado
        $user = $request->user();
        
        $image = $request->file('image');           // Video 29

        $message = Message::create([
            'user_id' => $user->id,
            'content' => $request->input('message'),
            // 'image' => 'http://lorempixel.com/600/338?'.mt_rand(0,1000)
            'image' => $image->store('messages','public')        // video 29: crea una carpeta messages con las imagenes, en el disco public
        ]);

        // redirecciono a la vista messages.show
        return redirect('/messages/'.$message->id);
    }

    //  Video 31: Funcion para buscar palabrs en los mensajes 
    public function search(Request $request)
    {
        $query = $request->input('query');          // Viene de la vista app.blade

        $messages = Message::where('content', 'LIKE', "%$query%")->get();
        // dd($messages);
        return view('messages.index', [
            'messages' => $messages
        ]);
    }
    
}
