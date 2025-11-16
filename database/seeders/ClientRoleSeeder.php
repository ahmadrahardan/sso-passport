<?php

namespace Database\Seeders;

use App\Models\ClientRole;
use App\Models\User;
use Laravel\Passport\Client;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class ClientRoleSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'bluepylox@gmail.com')->first();

        $clients = Client::all();

        $superRole = Role::where('name', 'super-admin')->first();

        foreach ($clients as $client) {
            ClientRole::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'client_id' => $client->id,
                ],
                [
                    'role_id' => $superRole->id,
                ]
            );
        }
    }
}


// <?php

// namespace Database\Seeders;

// use App\Models\ClientRole;
// use App\Models\User;
// use Laravel\Passport\Client;
// use Spatie\Permission\Models\Role;
// use Illuminate\Database\Seeder;

// class ClientRoleSeeder extends Seeder
// {
//     public function run(): void
//     {
//         $clients = Client::all();

//         $users = User::all();

//         foreach ($users as $user) {

//             $role = $user->roles()->first();

//             if (!$role) continue; 

//             foreach ($clients as $client) {
//                 ClientRole::updateOrCreate(
//                     [
//                         'user_id'   => $user->id,
//                         'client_id' => $client->id,
//                     ],
//                     [
//                         'role_id' => $role->id,
//                     ]
//                 );
//             }
//         }
//     }
// }
