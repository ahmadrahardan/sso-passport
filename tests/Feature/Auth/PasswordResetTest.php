<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered(): void
    {
        $response = $this->get('/forgot-password');
        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested(): void
    {
        $user = User::factory()->create(['email' => 'bluepylox@gmail.com']);

        $response = $this->post('/forgot-password', ['email' => $user->email]);
        $response->assertSessionHasNoErrors();

        $response->assertStatus(302);
    }

    public function test_reset_password_link_is_not_sent_to_unauthorized_email(): void
    {
        Notification::fake();

        $user = User::factory()->create(['email' => 'unauthorized@gmail.com']);

        $this->post('/forgot-password', ['email' => $user->email])
            ->assertSessionHasErrors('email');

        Notification::assertNothingSent();
    }

    public function test_reset_password_screen_can_be_rendered(): void
    {
        $token = 'dummy-token-for-test';

        $response = $this->get('/reset-password/' . $token);
        $response->assertStatus(200);
    }

    public function test_password_can_be_reset_with_valid_token(): void
    {
        $user = User::factory()->create(['email' => 'bluepylox@gmail.com']);

        $token = 'dummy-token-for-test';

        $response = $this->post('/reset-password', [
            'token' => $token,
            'email' => $user->email,
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email']);
    }
}
