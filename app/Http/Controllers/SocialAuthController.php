<?php

namespace App\Http\Controllers;

use App\User;
use App\SocialProfile;
use Socialite;
use Illuminate\Http\Request;

// video 23: Inicio de sesion con facebook, añadir: use socialite
// Video 24: Registro a traves de los datos de facebook

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
        // mostrar lo que trajo:  dd($user);

        // Video 25: Consulta para saber si ya se registro antes con facebook, y mandarlo defrente
        $existing = User::whereHas('socialProfiles', function($query) use ($user) {
            $query->where('social_id',$user->id);
        })->first();
        if($existing !== null){
            auth()->login($existing);

            return redirect('/');
        }


        // datos por cada session
        session()->flash('facebookUser',$user);

        return view('users.facebook',[
            'user' => $user
        ]);
    }

    // Video 24: Obtener los datos desde facebook
    public function register(Request $request)
    {
        // Garantiza que los datos sean de facebook y no de los inputs,anteriormente obtenidos
        $data = session('facebookUser');

        $username = $request->input('username');        // username viene de ...??, parece q de la interfaz!!

        // Crear un usuario
        $user = User::create([
            'name' => $data->name ,
            'email' => $data->email ,
            'avatar' => $data->avatar ,
            'username' => $username ,
            'password' => str_random(16)        //random: 
        ]);

        // Asociar el usuario a un perfil de usuario
        $profile = SocialProfile::create([
            'social_id' => $data->id,
            'user_id' => $user->id,
        ]);

        // Loguear a este usuario , acabado de crear
        auth()->login($user);

        //  a la home
        return redirect('/');
    }    
}
