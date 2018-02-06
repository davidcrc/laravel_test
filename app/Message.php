<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;       // video 33

// Eloquent: ORM - Object relacional Mapper: COnvierte de relacional a objetos
//  ---algo de activerecord

// Video 18: Relaciona messages (user_id ) con la tabla de usuarios (id)

class Message extends Model
{
    //El nombre de la clase represnta el de la tabla a buscar (anade una s al final)
    //  va a buscar el que tenga primary key

    // video 13: Debemos tener una variable protegida, para que exista algo protegido 
    //  no importa si esta vacio ; puedes proteger alguna cosa en la BD , cosa q no se
    //  crean objetos automaticamente
    protected $guarded = [];

    use Searchable;             // video 33

    // Video 18: Pertenecia de una tabla con otra (messages con users)
    public function user()
    {
        return $this->belongsTo(User::class);

    }

    // Video 29: Tomara el atributo de una imagen
    public function getImageAttribute($image)       // esta reescribiendo una fucnion??
    {
        if (!$image || starts_with($image, 'http')){
            return $image;
        }

        return \Storage::disk('public')->url($image);
    }
}
