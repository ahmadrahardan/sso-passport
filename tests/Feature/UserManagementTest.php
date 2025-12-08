<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Tests\CreatesRoles;

class UserManagementTest extends TestCase
{
    use RefreshDatabase, CreatesRoles;

    protected function setUp(): void
    {
        parent::setUp();
        $this->createRoles();
    }

    private function admin()
    {
        $admin = User::factory()->create();
        $admin->assignRole('super-admin');
        return $admin;
    }

    /** @test */
    public function admin_dapat_melihat_daftar_user()
    {
        $response = $this->actingAs($this->admin())->get('/users');

        $response->assertStatus(200)
            ->assertViewIs('admin.users.index')
            ->assertViewHas('users');
    }

    /** @test */
    public function admin_dapat_mengakses_form_tambah_user()
    {
        $response = $this->actingAs($this->admin())->get('/users/create');

        $response->assertStatus(200)
            ->assertViewIs('admin.users.create');
    }

    /** @test */
    public function admin_dapat_menambah_user_baru()
    {
        $admin = $this->admin();

        $data = [
            'name'     => 'User Baru',
            'email'    => 'baru@example.com',
            'password' => 'password123',
        ];

        $response = $this->actingAs($admin)->post('/users', $data);

        $response->assertRedirect('/users')
            ->assertSessionHas('success', 'User berhasil ditambahkan');

        $this->assertDatabaseHas('users', [
            'email' => 'baru@example.com',
        ]);
    }

    /** @test */
    public function validasi_error_saat_tambah_user_tanpa_data()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin)->post('/users', []);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    /** @test */
    public function admin_dapat_mengakses_form_edit_user()
    {
        $admin = $this->admin();
        $user  = User::factory()->create();

        $response = $this->actingAs($admin)->get("/users/{$user->id}/edit");

        $response->assertStatus(200)
            ->assertViewIs('admin.users.edit')
            ->assertViewHas('user');
    }

    /** @test */
    public function admin_dapat_mengupdate_user()
    {
        $admin = $this->admin();
        $user  = User::factory()->create();

        $response = $this->actingAs($admin)->patch("/users/{$user->id}", [
            'name'  => 'Updated',
            'email' => 'updated@example.com',
        ]);

        $response->assertRedirect('/users')
            ->assertSessionHas('success', 'User berhasil diperbarui');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'email' => 'updated@example.com',
        ]);
    }

    /** @test */
    public function admin_dapat_mengupdate_user_dengan_password_baru()
    {
        $admin = $this->admin();
        $user  = User::factory()->create();

        $response = $this->actingAs($admin)->patch("/users/{$user->id}", [
            'name'     => 'Updated',
            'email'    => 'new@example.com',
            'password' => 'newpass123',
        ]);

        $response->assertRedirect('/users');

        $this->assertTrue(Hash::check('newpass123', $user->fresh()->password));
    }

    /** @test */
    public function validasi_error_saat_update_email_sudah_dipakai()
    {
        $admin = $this->admin();

        $user1 = User::factory()->create(['email' => 'a@a.com']);
        $user2 = User::factory()->create();

        $response = $this->actingAs($admin)->patch("/users/{$user2->id}", [
            'name'  => 'Test',
            'email' => 'a@a.com',
        ]);

        $response->assertSessionHasErrors('email');
    }
}
