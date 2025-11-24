<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ClientRole;
use Laravel\Passport\Client;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class ClientRoleController extends Controller
{
    public function edit(User $user)
    {
        return view('admin.client-role.edit', [
            'user'        => $user,
            'clients'     => Client::all(),
            'roles'       => Role::all(),
            'clientRoles' => $user->clientRoles()->get()->keyBy('client_id'),
        ]);
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'client_id' => 'required|exists:oauth_clients,id',
            'role_id'   => 'required|exists:roles,id',
        ]);

        ClientRole::updateOrCreate(
            [
                'user_id'   => $user->id,
                'client_id' => $request->client_id,
            ],
            [
                'role_id' => $request->role_id,
            ]
        );

        $role = Role::find($request->role_id);

        if ($role) {
            $user->syncRoles([$role->name]);
        }

        return redirect()->route('users.index')->with('success', 'Role berhasil diatur untuk client ini.');
    }
}
