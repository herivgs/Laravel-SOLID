<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTaskControllerGet()
    {
        $this->call('POST', '/login', [
            'email' => 'admin@grupoalcon.com',
            'password' => 'Ga123456',
            '_token' => csrf_token()
        ]);

        // $todos = factory('App\Types\Task', 3)->create();

        $response = $this->json('GET', '/task');
        $response->assertStatus(200);
        $this->assertTrue(!!$response->original);
    }
}
