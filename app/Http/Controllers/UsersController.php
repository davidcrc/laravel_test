<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

// Video 19: Mostar todos los mensajes de un usuario
//          

class UsersController extends Controller
{
    // buscar al usuario y encontrar todos sus mensajes
    public function show($username)
    {
        $user = User::where('username', $username)->first();

        return view('users.show', [
            'user' => $user,
        ]);
    }
}
