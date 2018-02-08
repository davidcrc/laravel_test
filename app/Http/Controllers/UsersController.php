<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\PrivateMessage;
use App\User;
use App\Notifications\UserFollowed;         // para el envio de email por seguimiento
use Illuminate\Http\Request;

// Video 19: Mostar todos los mensajes de un usuario
//          
// Video 20: Funcion para encontrar a quien sigo: attach() 
// Video 21: Funcion para unfollow a un usuario: detach()
//      funcion followers 
// Video 27: Funcion para recibir un mensaje y convertirlo en una conversacion , SendPrivateMessage
//      tmbn App\Conversation, App\PrivateMessage

class UsersController extends Controller
{
    // buscar al usuario y encontrar todos sus mensajes
    public function show($username)
    {
        // throw new \Exception("Simulacion");      // Video 30. lanzando un error manual
        // $user = User::where('username', $username)->first();
        $user = $this->findByUsername($username);

        return view('users.show', [
            'user' => $user,
        ]);
    }

    // video 20: A quien sigue
    public function follows($username)
    {
        $user = $this->findByUsername($username);

        return view('users.follows', [
            'user' => $user,
            'follows' => $user->follows,            
        ]);
    }

    // $user es seguido por el usuario logueado
    public function follow($username, Request $request)
    {
        $user = $this->findByUsername($username);
        
        $me = $request->user();             //usuario logueado

        $me->follows()->attach($user);      //agregue a $user

        // Video 39: logueado sigue a $user, entonces quiero notificar a $user que $me lo esta siguiendo
        $user->notify(new UserFollowed($me) );      

        return redirect("/$username")->withSuccess('Usuario seguido con Exito!!');
        
    }

    // Dejar de seguir
    public function unfollow($username, Request $request)
    {
        $user = $this->findByUsername($username);
        
        $me = $request->user();             //usuario logueado

        $me->follows()->detach($user);      //agregue a $user

        return redirect("/$username")->withSuccess('Usuario NO seguido!!');
        
    }

    // Quien lo sigue a este usuario
    public function followers($username)
    {
        $user = $this->findByUsername($username);

        return view('users.follows', [
            'user' => $user,
            'follows' => $user->followers,
        ]);
    }
    
    // Video 27: Atrapar el mensaje 
    public function sendPrivateMessage($username, Request $request)     //username , el usuario q estoy viendo
    {
        $user = $this->findByUsername($username);

        $me = $request->user();
        $message = $request->input('message');

        // Video 28: Tengo ya una conversacion con este usuario?
        $conversation = Conversation::between($me,$user);    // conversation.php->funcion()

        // Se crea una conversacion para los usuarios, ver: App\Conversation->users()
        // -- Aqui eliminado en video 28: esta echo ahora en betweeen()
        // $conversation = Conversation::create();
        // $conversation->users()->attach($me);
        // $conversation->users()->attach($user);

        $privateMessage = PrivateMessage::create([      //PrivateMessage.php crear un guarded[]
            'conversation_id' => $conversation->id,
            'user_id' => $me->id,
            'message' => $message
        ]);

        return redirect('/conversations/'.$conversation->id);
    }

    // vid 27: mostar la conversacion
    public function showConversation(Conversation $conversation)
    {  
        $conversation->load('users','privateMessages');     // sus funciones() , debe cargar toditos los datos de los usuarios??
        // dd($conversation);

        return view('users.conversation', [
            'conversation' => $conversation,
            'user' => auth()->user(),
        ]);
    }


    private function findByUsername($username)
    {
        // return User::where('username', $username)->first();
        return User::where('username', $username)->firstorFail();       // para recurso por URL
    }

    // Video 41: Notificaciones al usuario logueado
    public function notifications(Request $request)
    {
        return $request->user()->notifications;       // el id del usuario actual buscara sus notificaciones-> ya de laravel
    }
    
}
