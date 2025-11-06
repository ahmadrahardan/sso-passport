<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // reset cache spatie
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        foreach (['super-admin','admin-gudang-umum','tim-ppk','penanggung-jawab','tim-teknis','instalasi'] as $name) {
            Role::findOrCreate($name, 'web');
        }
    }
}
