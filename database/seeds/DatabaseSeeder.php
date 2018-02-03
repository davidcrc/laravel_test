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
        factory(App\Message::class)
            ->times(20)        //le paso el numero a crear
            ->create([
                'user_id' => $user->id,      // agregado en el video 18
            ]);
            
            $user->follows()->sync(       //Modificar la relacion, para agregar 10 follows al azar (sync())
                $users->random(10)   
            );
        });

    }
}
