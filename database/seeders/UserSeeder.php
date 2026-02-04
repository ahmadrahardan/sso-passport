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
                'name' => 'Tim PPK',
                'email' => 'timppk@gmail.com',
                'role' => 'tim-ppk',
            ],
            [
                'name' => 'Instalasi',
                'email' => 'instalasi@gmail.com',
                'role' => 'instalasi',
            ],
            [
                'name' => 'Admin Gudang',
                'email' => 'admingudang@gmail.com',
                'role' => $roles['ADMIN_GUDANG']
            ],
            [
                'name' => 'Tim Teknis',
                'email' => 'timteknis@gmail.com',
                'role' => $roles['TEKNIS']
            ],
            [
                'name' => 'Tim PPK',
                'email' => 'timppk@gmail.com',
                'role' => $roles['PPK']
            ],
            [
                'name' => 'Penanggung Jawab',
                'email' => 'penanggungjawab@gmail.com',
                'role' => $roles['PENANGGUNG_JAWAB']
            ],
            [
                'name' => 'Instalasi',
                'email' => 'instalasi@gmail.com',
                'role' => $roles['INSTALASI']
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
