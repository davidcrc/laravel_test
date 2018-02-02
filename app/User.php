<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// video 17: autenticacion 
// video 19: Relacion hasmany

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // EL concepto contrario de guarded, variables que se pueden llenar?
    // MOD: username, avatar
    protected $fillable = [
        'name','username', 'avatar' , 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // video:19 Le digo a este modelo de usuarios que otro modelo (Message) tiene muchos user_id
    // orderBy('created_at','desc')
    public function messages()
    {
        return $this->hasMany(Message::class)->orderBy('created_at','desc');
    }
}
