<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model
{
    //
    protected $guarded = [];

    // Video 24: ""Varios"" SocialProfile pertenece a un solo usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
