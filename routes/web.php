<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OauthClientController;
use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\CustomAuthorizationController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('portal');
    }

    // Paksa setelah login mendarat ke /portal
    session()->put('url.intended', route('portal'));

    return redirect()->route('login');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/portal', function () {
        $apps = collect(config('apps', []));
        // TODO: jika ada role-based filtering
        return view('portal.index', ['apps' => $apps]);
    })->name('portal');
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

Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    $redirect = request('redirect', '/');
    // (opsional) whitelist origin untuk cegah open redirect
    return redirect($redirect);
})->name('sso.logout');

require __DIR__.'/auth.php';
