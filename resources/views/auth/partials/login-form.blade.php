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

    <!-- Alert -->
    @if ($errors->any() || session('error'))
        <div x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 3000)"
            class="absolute top-4 left-1/2 transform -translate-x-1/2 w-11/12 max-w-md z-50">
            <div class="p-4 bg-red-500 text-white rounded-lg shadow-lg flex items-center gap-2">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                <p class="text-sm font-medium">
                    Login gagal. Username atau password tidak valid, silahkan coba lagi
                </p>
            </div>
        </div>
    @endif

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
