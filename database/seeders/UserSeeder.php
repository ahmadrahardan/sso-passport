<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'super-admin',
            'admin-gudang-umum',
            'tim-teknis',
            'tim-ppk',
            'instalasi',
            'penanggung-jawab',
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role, 'guard_name' => 'web']);
        }

        $users = [
            [
                'name' => 'Fauzul Akbar',
                'email' => 'fauzulakbar2575@gmail.com',
                'role' => 'super-admin',
            ],
            [
                'name' => 'Rayya',
                'email' => 'bluepylox@gmail.com',
                'role' => 'super-admin',
            ],
            [
                'name' => 'Admin Gudang',
                'email' => 'admingudang@gmail.com',
                'role' => 'admin-gudang-umum'
            ],
            [
                'name' => 'Tim Teknis',
                'email' => 'timteknis@gmail.com',
                'role' => 'tim-teknis'
            ],
            [
                'name' => 'Tim PPK',
                'email' => 'timppk@gmail.com',
                'role' => 'tim-ppk'
            ],
            [
                'name' => 'Penanggung Jawab',
                'email' => 'penanggungjawab@gmail.com',
                'role' => 'penanggung-jawab'
            ],
            [
                'name' => 'Instalasi',
                'email' => 'instalasi@gmail.com',
                'role' => 'instalasi'
            ],
        ];

        foreach ($users as $userData) {
            $user = User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => Hash::make('password'),
                    'email_verified_at' => now(),
                ]
            );

            $user->syncRoles($userData['role']);
        }
    }
}
