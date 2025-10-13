<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OauthClientController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\CustomAuthorizationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('clients', [OauthClientController::class, 'index'])->name('clients.index');
    Route::get('clients/create', [OauthClientController::class, 'create'])->name('clients.create');
    Route::post('clients', [OauthClientController::class, 'store'])->name('clients.store');
    Route::get('clients/{client_id}/edit', [OauthClientController::class, 'edit'])->name('clients.edit');
    Route::put('clients/{client_id}', [OauthClientController::class, 'update'])->name('clients.update');
    Route::delete('clients/{client_id}', [OauthClientController::class, 'destroy'])->name('clients.destroy');

});

Route::get('/auth/google/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/oauth/authorize', [CustomAuthorizationController::class, 'authorize'])
        ->name('passport.authorizations.authorize');
});


require __DIR__.'/auth.php';
