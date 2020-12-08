<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostLoginTest extends TestCase
{
    public function testPostLoginSuccess()
    {
        $response = $this->postJson(
            '/api/login',
            ['email' => 'edgaars@gmail.com', 'password' => '123123123']
        );

        $response
            ->assertStatus(200)
            ->assertJson(["token" => true,])
            ->assertJsonPath('token.accessToken.name', 'APIAuthToken');
    }
}