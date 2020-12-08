<?php

namespace Tests\Feature;

use Tests\TestCase;

class PostLoginTest extends TestCase
{
    public function testPostLoginSuccess()
    {
        $response = $this->postJson(
            '/api/login',
            ['email' => 'bob@gmail.com', 'password' => '123456']
        );

        $response
            ->assertStatus(200)
            ->assertJson(["token" => true,])
            ->assertJsonPath('token.accessToken.name', 'APIAuthToken');
    }
}
