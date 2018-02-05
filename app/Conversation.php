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
        return $this->hasMany(PrivateMessage::class);
    }
}
