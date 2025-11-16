@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="mb-4">Edit User</h3>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Password (kosongkan jika tidak diganti)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button class="btn btn-success">Update</button>
        </form>

    </div>
@endsection
