<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;

// video 23: Inicio de sesion con facebook, añadir: use socialite

class SocialAuthController extends Controller
{
    // llevar al usuario a la red de facebook
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // los datos del usuario desde facebook
    public function callback()
    {
        $user = Socialite::driver('facebook')->user();
        // mostrar lo que trajo:
        // dd($user);
    }
}
