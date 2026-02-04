<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    public function create(): View
    {
        return view('auth.forgot-password');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $superAdminEmails = User::role('super-admin')->pluck('email')->toArray();
        $manualEmails = ['bluepylox@gmail.com', 'fauzulakbar2575@gmail.com'];
        $allowedEmails = array_merge($superAdminEmails, $manualEmails);

        if (!in_array($request->email, $allowedEmails)) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'Permintaan reset password tidak dapat diproses untuk akun ini.']);
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', 'Link reset password telah dikirim ke email Anda.')
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }
}
