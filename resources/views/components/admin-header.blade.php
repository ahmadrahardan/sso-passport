<div class="w-full bg-white shadow-sm">
    <div class="flex items-center justify-between px-6 py-4">

        {{-- LEFT: Greeting --}}
        <div>
            <h1 class="text-xl font-semibold text-gray-800">
                Selamat Datang
            </h1>
            <p class="text-blue-600 font-medium text-sm">
                {{ Auth::user()->name ?? 'Admin' }}!
            </p>
        </div>

        {{-- RIGHT: Icons --}}
        <div x-data="{ open: false }" class="relative">

            {{-- Klik avatar atau nama untuk toggle dropdown --}}
            <div class="flex items-center gap-2 cursor-pointer" @click="open = !open">

                <img src="/avatar/user.png" class="w-10 h-10 rounded-full border shadow">

                <div class="text-sm text-gray-700 font-semibold select-none">
                    {{ Auth::user()->name ?? 'User' }}
                </div>
            </div>

            {{-- DROPDOWN --}}
            <div x-show="open" @click.away="open = false" x-transition
                class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg py-2 z-50">

                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    Profile
                </a>

                <a href="{{ route('dashboard') }}"
                    class="block px-6 py-3 hover:bg-blue-600
                            {{ request()->is('users*') ? 'bg-blue-600' : '' }}">
                    Dashboard
                </a>

            </div>

        </div>

    </div>
</div>
