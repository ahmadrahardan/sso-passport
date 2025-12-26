<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->name = $request->name;

        if ($request->filled('password')) {
            $request->validate(
                [
                    'password' => [
                        'required',
                        'confirmed',
                        Password::min(8)
                            ->letters()
                            ->numbers()
                            ->symbols(),
                    ],
                ],
                [
                    'password.required' => 'Password wajib diisi.',
                    'password.min' => 'Password minimal 8 karakter.',
                    'password.letters' => 'Password harus mengandung huruf.',
                    'password.numbers' => 'Password harus mengandung angka.',
                    'password.symbols' => 'Password harus mengandung simbol.',
                    'password.confirmed' => 'Konfirmasi password tidak cocok.',
                ]
            );

            $user->password = Hash::make($request->password);
        }

        $user->save();

        return Redirect::route('profile.edit')
            ->with('success', 'Anda berhasil mengedit profil');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
