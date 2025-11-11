<div class="flex flex-col h-full">

    <!-- Header Section -->
    <div class="mb-8 text-center">
        <p class="text-gray-500 text-sm font-medium tracking-wide mb-6">
            SINGLE SIGN ON
        </p>

        <div class="flex justify-center">
            <img src="{{ asset('images/Logo RSDB.png') }}" alt="RSD Balung Logo" class="h-24 w-auto">
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('login') }}" method="POST" id="loginForm" class="space-y-6">
        @csrf

        <!-- Username Input -->
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                Username
            </label>
            <input type="text" id="username" name="username" placeholder="Username"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
                value="{{ old('username') }}" required>
            @error('username')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password Input -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                Password
            </label>
            <div class="relative">
                <input type="password" id="password" name="password" placeholder="Password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out pr-12"
                    required>
            </div>
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Forgot Password -->
        <div class="text-right">
            <a href="{{ route('password.request') }}"
                class="text-sm text-blue-600 hover:text-blue-700 transition duration-200">
                Lupa password?
            </a>
        </div>

        <!-- Submit Button -->
        <x-primary-button>
            {{ __('Login') }}
        </x-primary-button>
    </form>

</div>
