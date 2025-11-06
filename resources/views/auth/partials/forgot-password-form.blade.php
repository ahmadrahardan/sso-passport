<div class="flex flex-col h-full">

    <!-- Header Section -->
    <div class="mb-8 text-center">
        <p class="text-gray-500 text-sm font-medium tracking-wide mb-6">
            Kembali ke SSO ? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-semibold">Log In</a>
        </p>

        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/Logo RSDB.png') }}"
                alt="RSD Balung Logo"
                class="h-24 w-auto">
        </div>

        <p class="text-gray-600 text-sm px-4">
            Lupa reset password atau lupa username email tersebut, silahkan untuk digunakan bersama kemudahan akses untuk berkomunikasi lewat email anda sebelumnya.
        </p>
    </div>

    <!-- Form -->
    <form action="{{ route('password.email') }}" method="POST" id="forgotPasswordForm" class="space-y-6">
        @csrf

        @if (session('status'))
            <div class="p-4 bg-green-50 border border-green-200 rounded-lg">
                <p class="text-sm text-green-800">{{ session('status') }}</p>
            </div>
        @endif

        <!-- Email Input -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                Masukkan Email
            </label>
            <input
                type="text"
                id="email"
                name="email"
                placeholder="Email"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 ease-in-out"
                value="{{ old('email') }}"
                required
                autofocus>
        </div>

        <!-- Submit Button -->
        <button
            type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 ease-in-out">
            Kirim
        </button>

    </form>

</div>
