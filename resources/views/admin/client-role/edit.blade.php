@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="mb-4">Role User per Client: <b>{{ $user->name }}</b></h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('client-role.store', $user) }}" class="card p-4 mb-4">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <label>Pilih Client</label>
                    <select name="client_id" class="form-control" required>
                        <option value="">-- pilih client --</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }} (ID: {{ $client->id }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label>Pilih Role</label>
                    <select name="role_id" class="form-control" required>
                        <option value="">-- pilih role --</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 d-flex align-items-end">
                    <button class="btn btn-success w-100">Simpan</button>
                </div>
            </div>

        </form>

        <h4>Role User Saat Ini</h4>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $clientRoles[$client->id]->role->name ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
