<?php

use Illuminate\Database\Seeder;

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
        factory(App\User::class, 50)->create()->each(function(App\User $user){
        
        // Video 14:
        factory(App\Message::class)
            ->times(20)        //le paso el numero a crear
            ->create([
                'user_id' => $user->id,      // agregado en el video 18
            ]);

        });

    }
}
