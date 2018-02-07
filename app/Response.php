<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    //
    protected $guarded = [];
    
    // Video 37: Una respuesta tiene un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Video 37: Una respuesta tiene un mensanje
    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
