<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $r) {
    $u = $r->user();
    return [
        'id'    => $u->id,
        'name'  => $u->name,
        'email' => $u->email,
        // boleh tambahkan 'roles' kalau mau, tapi Socialite hanya butuh id/name/email
    ];
});

// endpoint yang lebih lengkap tetap boleh ada
Route::middleware('auth:api')->get('/me', function (Request $r) {
    $u = $r->user();
    return [
        'id'    => $u->id,
        'name'  => $u->name,
        'email' => $u->email,
        'roles' => $u->getRoleNames(),
    ];
});

