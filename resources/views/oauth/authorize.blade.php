@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Authorization Request</div>

                <div class="card-body">
                    <h5><strong>{{ $client->name }}</strong> is requesting permission to access your account.</h5>
                    <hr>

                    @if (count($scopes) > 0)
                        <h6>This application will be able to:</h6>
                        <ul>
                            @foreach ($scopes as $scope)
                                <li>{{ $scope->description }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="d-flex justify-content-end">
                        <form method="post" action="{{ route('passport.authorizations.deny') }}" class="me-2">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="state" value="{{ $request->state }}">
                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                            <button type="submit" class="btn btn-danger">Deny</button>
                        </form>

                        <form method="post" action="{{ route('passport.authorizations.approve') }}">
                            @csrf
                            <input type="hidden" name="state" value="{{ $request->state }}">
                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                            <input type="hidden" name="auth_token" value="{{ $authToken ?? '' }}">
                            <button type="submit" class="btn btn-success">Authorize</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
