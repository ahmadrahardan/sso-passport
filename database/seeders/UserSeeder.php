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
        $super = User::updateOrCreate(
            ['email' => 'bluepylox@gmail.com'],
            ['name' => 'Rayyaa', 'password' => Hash::make('password')]
        );
        $super->syncRoles(['super-admin']);

        $ppk = User::updateOrCreate(
            ['email' => 'timppk@gmail.com'],
            ['name' => 'TimPPK', 'password' => Hash::make('password')]
        );
        $ppk->syncRoles(['tim-ppk']);

        $instalasi = User::updateOrCreate(
            ['email' => 'instalasi@gmail.com'],
            ['name' => 'Instalasi', 'password' => Hash::make('password')]
        );
        $instalasi->syncRoles(['instalasi']);
    }
}
