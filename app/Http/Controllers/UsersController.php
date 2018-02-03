<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

// Video 19: Mostar todos los mensajes de un usuario
//          
// Video 20: Funcion para encontrar a quien sigo: attach() 
// Video 21: Funcion para unfollow a un usuario: detach()
//      funcion followers 
class UsersController extends Controller
{
    // buscar al usuario y encontrar todos sus mensajes
    public function show($username)
    {
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

    // Seguir a un usuario x
    public function follow($username, Request $request)
    {
        $user = $this->findByUsername($username);
        
        $me = $request->user();             //usuario logueado

        $me->follows()->attach($user);      //agregue a $user

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

    private function findByUsername($username)
    {
        return User::where('username', $username)->first();
    }
    
}
