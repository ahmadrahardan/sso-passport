<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /** @test */
    public function users_can_authenticate_using_username_and_password(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'username' => $user->name,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    /** @test */
    public function users_cannot_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'username' => $user->name,
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors('username');
        $this->assertGuest();
    }

    /** @test */
    public function users_can_logout_successfully(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}
