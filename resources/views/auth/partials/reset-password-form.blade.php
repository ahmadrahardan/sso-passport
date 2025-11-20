<div class="flex flex-col h-full">

    <!-- Header Section -->
    <div class="mb-8 text-center">
        <p class="text-gray-500 text-sm font-medium tracking-wide mb-6">
            Kembali ke SSO ? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold">Log
                In</a>
        </p>

        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/Logo RSDB.png') }}" alt="RSD Balung Logo" class="h-24 w-auto">
        </div>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('password.store') }}" id="resetPasswordForm" class="space-y-6">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Input -->
        <div class="space-y-4">

            <!-- Email -->
            {{-- <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <input type="email" id="email" name="email" placeholder="Email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2
                            focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
                    value="{{ old('email', $request->email) }}" required autofocus>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div> --}}

            <!-- Password Baru -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    Password Baru
                </label>
                <input type="password" id="password" name="password" placeholder="Password Baru"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2
                            focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
                    required>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi Password Baru -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                    Konfirmasi Password Baru
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Konfirmasi Password Baru"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2
                            focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
                    required>
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700
                    focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 ease-in-out">
            Kirim
        </button>
    </form>
</div>
