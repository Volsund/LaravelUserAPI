<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class GetAuthUserDataTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testGetAuthorizedData()
    {
        $user = User::first();
        $token = $user->createToken('newToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => "Bearer " . $token,
        ])->get('/api/me');

        $response->assertStatus(200)
            ->assertJson([
                "name" => $user->name,
                "email" => $user->email,
                "phone_number"=>$user->phone_number
            ]);
    }
}
