<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_register_user(): void
    {
        $response = $this->post('api/auth/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password'
        ]);

        $response->assertStatus(204);
    }

    public function test_cannot_register_user_with_existing_email(): void
    {
        $this->post('api/auth/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password'
        ]);

        $another = $this->post('api/auth/register', [
            'name' => 'Jane Doe',
            'emails' => 'john@example.com',
            'password' => 'password'
        ]);

        $another->assertStatus(422)
            ->assertJsonValidationErrorFor('email');
    }

    public function test_cannot_register_with_invalid_data(): void
    {
        $response = $this->post('api/auth/register', [
            'name' => '',
            'email' => 'not-an-email',
            'password' => 'short'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'password']);
    }
}
