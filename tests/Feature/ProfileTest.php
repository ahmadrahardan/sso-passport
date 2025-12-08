<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Tests\CreatesRoles;

class ProfileTest extends TestCase
{
    use RefreshDatabase, CreatesRoles;

    protected function setUp(): void
    {
        parent::setUp();
        $this->createRoles();
    }

    /** @test */
    public function dapat_membuka_halaman_edit_profile()
    {
        $user = User::factory()->create();
        $user->assignRole('super-admin');

        $response = $this->actingAs($user)->get('/profile');

        $response->assertStatus(200)
            ->assertViewIs('profile.edit')
            ->assertViewHas('user');
    }

    /** @test */
    public function dapat_update_profile_tanpa_password()
    {
        $user = User::factory()->create();
        $user->assignRole('super-admin');

        $response = $this->actingAs($user)->patch('/profile', [
            'name'  => 'Nama Baru',
            'email' => 'newemail@example.com',
        ]);

        $response->assertRedirect('/profile')
            ->assertSessionHas('status', 'profile-updated');

        $this->assertDatabaseHas('users', [
            'id'    => $user->id,
            'name'  => 'Nama Baru',
            'email' => 'newemail@example.com',
        ]);
    }

    /** @test */
    public function dapat_update_password()
    {
        $user = User::factory()->create();
        $user->assignRole('super-admin');

        $response = $this->actingAs($user)->patch('/profile', [
            'name'                  => 'User',
            'email'                 => $user->email,
            'password'              => 'password_baru',
            'password_confirmation' => 'password_baru',
        ]);

        $response->assertRedirect('/profile')
            ->assertSessionHas('status', 'profile-updated');

        $this->assertTrue(Hash::check('password_baru', $user->fresh()->password));
    }

    /** @test */
    public function gagal_update_password_jika_konfirmasi_salah()
    {
        $user = User::factory()->create();
        $user->assignRole('super-admin');

        $response = $this->actingAs($user)->patch('/profile', [
            'name'                  => $user->name,
            'email'                 => $user->email,
            'password'              => 'password_baru',
            'password_confirmation' => 'salah',
        ]);

        $response->assertSessionHasErrors('password');
    }
}
