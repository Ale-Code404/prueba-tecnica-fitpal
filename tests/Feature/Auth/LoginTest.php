<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_cannot_login_with_invalid_credentials(): void
    {
        $response = $this->post('api/auth/login', [
            'email' => 'wrong@example.com',
            'password' => 'invalidpassword'
        ]);

        $response->assertStatus(401);
    }

    public function test_cannot_login_with_invalid_data(): void
    {
        $response = $this->post('api/auth/login', [
            'email' => 'not-an-email',
            'password' => ''
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email', 'password']);
    }
}
