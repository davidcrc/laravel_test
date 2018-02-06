<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;



class UsersTest extends TestCase
{
    use DatabaseTransactions;       // vid35: pa q no se agregue a la BD
    use InteractsWithDatabase;      // vid35: si hay cambios en la BD

    // Video 35: Test para creacion de usuarios
    public function testCanSeeUserPage()
    {
        $user = factory(User::class)->create();

        // verifica lo q retorna
        $response = $this->get($user->username);
        $response->assertSee($user->name);
    }
    // Chekar si me puego loguear
    // public function testCanLogin()
    // {
    //     $user = factory(User::class)->create();

    //     // verifica el logueo
    //     $response = $this->post('/login',[
    //         'email' => $user->email,
    //         'password' => 'secret'
    //     ]);

    //     $this->seeIsAuthenticated();
    // }
    
    // como saber si un dato llego a la BD
    public function testCanFollow()
    {
        $user = factory(User::class)->create();
        $other = factory(User::class)->create();

        // verifica el seguimiento, en mi caso en get
        $response = $this->actingAs($user)->get($other->username.'/follow' );

        // cheka si la BD se habria modificado
        $this->assertDataBaseHAs('followers', [
            'user_id' => $user->id,
            'followed_id' => $other->id
        ]);
    }
}
