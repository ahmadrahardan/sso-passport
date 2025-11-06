<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OauthClientController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\CustomAuthorizationController;

Route::get('/', function () {
    if (Auth::check()) return redirect()->route('dashboard');
    session()->put('url.intended', route('dashboard'));
    return redirect()->route('login');
})->name('home');

Route::get('/dashboard', function () {
    $apps = collect(config('apps', []));
    return view('dashboard', compact('apps'));
})->middleware(['auth', PreventBackHistory::class])
    ->name('dashboard');

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
    if (Auth::check()) {
        $uid = Auth::id();
        DB::table('oauth_access_tokens')->where('user_id', $uid)->update(['revoked' => true]);
        DB::table('oauth_refresh_tokens')->whereIn('access_token_id', function ($q) use ($uid) {
            $q->select('id')->from('oauth_access_tokens')->where('user_id', $uid);
        })->update(['revoked' => true]);
    }

    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    $fallback = route('dashboard');
    $redirect = request('redirect', $fallback);

    $allowed = [
        'http://localhost:8000',
        'http://localhost:8080',
        // tambahkan domain produksi di sini
    ];
    $ok = collect($allowed)->contains(fn($base) => str_starts_with($redirect, $base));
    return redirect($ok ? $redirect : $fallback);
})->name('sso.logout');

require __DIR__ . '/auth.php';
