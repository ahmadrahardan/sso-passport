<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Passport\Client as OauthClient;

class OauthClientController extends Controller
{
    public function index()
    {
        $clients = OauthClient::where('owner_id', Auth::id())
            ->where('owner_type', User::class)
            ->orderBy('name', 'asc')
            ->get();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'redirect' => 'required|url|max:2048',
        ]);

        $client = new OauthClient;

        $client->owner_id = $request->user()->id;
        $client->owner_type = User::class;
        $client->name = $request->name;

        $client->redirect_uris = [$request->redirect];

        $client->grant_types = ['authorization_code'];
        $client->revoked = false;

        $plainSecret = Str::random(40);
        $client->secret = password_hash($plainSecret, PASSWORD_BCRYPT);

        $client->save();

        return redirect()->route('clients.index')->with([
            'success' => 'Client berhasil dibuat!',
            'new_client_id' => $client->id,
            'new_client_secret' => $plainSecret,
        ]);
    }

    public function update(Request $request, $client_id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'redirect' => 'required|url|max:2048',
        ]);

        $client = OauthClient::where('id', $client_id)
            ->where('owner_id', Auth::id())
            ->where('owner_type', User::class)
            ->firstOrFail();

        $client->forceFill([
            'name' => $request->name,
            'redirect_uris' => [$request->redirect],
        ])->save();

        return redirect()->route('clients.index')->with('success', 'Client berhasil diupdate.');
    }


    public function edit($client_id)
    {
        $client = OauthClient::where('id', $client_id)
            ->where('owner_id', Auth::id())
            ->where('owner_type', User::class)
            ->firstOrFail();

        return view('clients.edit', compact('client'));
    }

    public function destroy($client_id)
    {
        $client = OauthClient::where('id', $client_id)
            ->where('owner_id', Auth::id())
            ->where('owner_type', User::class)
            ->firstOrFail();

        $client->tokens()->delete();
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client berhasil dihapus.');
    }
}
