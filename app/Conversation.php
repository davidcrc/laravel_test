<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    // Video 27: Relacion entre cada conversacion y los usuarios q participan en esta
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // video 27: listar los mensajes
    public function privateMessages()
    {
        return $this->hasMany(PrivateMessage::class)->orderBy('created_at', 'desc');    //MOD video 28
    }

    // video 28: Obtener la conversacion existente entre usuarios
    //      retornando una conversacion | why static???
    public static function between(User $user, User $other)
    {
        // Busca la conversacion entre usuario
        $query = Conversation::whereHas('users', function ($query) use($user){
            $query->where('user_id',$user->id);
        })->whereHas('users', function ($query) use($other){
            $query->where('user_id', $other->id);
        });

        // Sino existe se crea
        $conversation = $query->firstOrCreate([]);      //si existe la devuelve, sino la crea

        // garantiza que ambos usuarios seran ingresados a la conversacion
        $conversation->users()->sync([          // relacion
            $user->id, $other->id   
        ]);

        return $conversation;
    }
}
