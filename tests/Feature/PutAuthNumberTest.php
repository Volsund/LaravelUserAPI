<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PutAuthNumberTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPutUpdateNumber()
    {
        $user = User::first();
        $token = $user->createToken('newToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => "Bearer " . $token,
        ])->json('PUT', '/me', ['number' => '321321312']);

        $response->assertStatus(200)
            ->assertJson([
                "name" => $user->name,
                "email" => $user->email,
                "phone_number" => $user->phone_number
            ]);
    }
}