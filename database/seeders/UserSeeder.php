<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin (akan di-update kalau sudah ada email yang sama)
        User::updateOrCreate(
            ['email' => 'bluepylox@gmail.com'],
            [
                'name'              => 'Rahardan',
                'password'          => Hash::make('password'), // ganti sesuai mau
                'email_verified_at' => now(),
            ]
        );

        // User biasa contoh
        User::updateOrCreate(
            ['email' => 'almas@gmail.com'],
            [
                'name'              => 'Almas',
                'password'          => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
    }
}
