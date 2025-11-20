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
                class="absolute right-0 mt-2 w-32 bg-white border rounded-lg shadow-lg py-2 px-2 z-50">

                <!-- Profile Link -->
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center px-4 py-2 text-md rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 mr-2"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z"></path></svg>
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
