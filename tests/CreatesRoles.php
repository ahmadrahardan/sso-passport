<?php

namespace Tests;

use Spatie\Permission\Models\Role;

trait CreatesRoles
{
    public function createRoles()
    {
        if (! Role::where('name', 'super-admin')->exists()) {
            Role::create(['name' => 'super-admin', 'guard_name' => 'web']);
        }
    }
}
