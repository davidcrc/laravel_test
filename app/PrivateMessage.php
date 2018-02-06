<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    // Video 27: Agregar para permitir crear datos, min 7
    protected $guarded = [];

    // Video 27: Un mensaje pertenece a un usuario
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
