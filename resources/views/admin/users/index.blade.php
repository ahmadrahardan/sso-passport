@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="mb-4">User Management</h3>

        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">+ Tambah User</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>

                            <a href="{{ route('client-role.edit', $user) }}" class="btn btn-info btn-sm">
                                Role per Client
                            </a>

                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus user?')" class="btn btn-danger btn-sm">Hapus</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
