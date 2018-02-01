<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Eloquent: ORM - Object relacional Mapper: COnvierte de relacional a objetos
//  ---algo de activerecord

class Message extends Model
{
    //El nombre de la clase represnta el de la tabla a buscar (anade una s al final)
    //  va a buscar el que tenga primary key

    // video 13: Debemos tener una variable protegida, para que exista algo protegido 
    //  no importa si esta vacio ; puedes proteger alguna cosa en la BD , cosa q no se
    //  crean objetos automaticamente
    protected $guarded = [];
}
