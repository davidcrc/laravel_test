<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Arrange | Preparacion

        // Act | Accion
        $response = $this->get('/');

        // Assert | verificacion
        $response->assertStatus(200);
    }

    // Video 35: ..las funciones deben empezar con test
    public function testCanSearchForMessages()
    {
        $response = $this->get('/messages?query=Allice');

        $response->assertSee('Alice');
        // $response->assertSee('Alicia en el pais');
    }
}
