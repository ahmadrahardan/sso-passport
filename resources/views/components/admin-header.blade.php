<div class="w-full bg-white shadow-md border-b ">
    <div class="flex items-center justify-between px-14 py-4">

        {{-- LEFT: Greeting --}}

        <div>
            <h1 class="text-xl font-semibold text-gray-800"> Selamat Datang </h1>
            <p class="text-blue-600 font-medium text-sm"> {{ Auth::user()->name ?? 'Admin' }}! </p>
        </div>

        {{-- RIGHT: Icons --}}
        <div x-data="{ open: false }" class="relative">

            <!-- Profile Toggle -->
            <div class="flex items-center gap-3 cursor-pointer" @click="open = !open">
                <!-- User Info -->
                <div class="text-lg text-gray-800 font-semibold select-none">
                    {{ Auth::user()->name ?? 'User' }}
                </div>
                <!-- User Avatar -->
                <img src="{{ asset('images/superadmin.png') }}"
                    class="w-12 h-12 rounded-full border-2 border-gray-200 shadow-lg transition-transform hover:scale-105">
            </div>

            <!-- Dropdown Menu -->
            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 mt-2 w-32 bg-white border rounded-lg shadow-lg py-2 z-50">

                <!-- Profile Link -->
                <a href="{{ route('profile.edit') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-200">
                    Profile
                </a>

                <!-- Dashboard Link -->
                {{-- <a href="{{ route('dashboard') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-200">
                    Dashboard
                </a> --}}
            </div>

        </div>


    </div>
</div>
