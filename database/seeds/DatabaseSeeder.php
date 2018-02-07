<?php

use Illuminate\Database\Seeder;

// Video 20: Modificado para que cada usuario q se crea, siga a unos 10 al azar

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        // Video 18: Crear para cada usuario mensajes
        $users = factory(App\User::class, 50)->create();

        $users->each(function(App\User $user) use($users) {     //use, le permite ver a users
        
        // Video 14:  Crea # mensajes 
        // factory(App\Message::class)
        //     ->times(20)        //le paso el numero a crear
        //     ->create([
        //         'user_id' => $user->id,      // agregado en el video 18
        //     ]);
        
        // Video 37:  Por cada mesaje creara random(1,10) respuesta {
            $messages = factory(App\Message::class)
                ->times(20)        //le paso el numero a crear
                ->create([
                    'user_id' => $user->id,      // agregado en el video 18
                ]);
                
                $messages->each( function (App\Message $message) use ($users) {
                    factory(App\Response::class, random_int(1,5))->create([     //mejor de 1 a 5 :V
                        'message_id' => $message->id,
                        'user_id' => $users->random(1)->first()->id ,
                    ]);
                });

                // Aun del video 14:
                $user->follows()->sync(       //Modificar la relacion, para agregar 10 follows al azar (sync())
                    $users->random(10)   
                );
        });

    }
}
