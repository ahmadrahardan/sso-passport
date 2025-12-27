<div class="w-full bg-white shadow-md border-b ">
    <div class="flex items-center justify-between px-14 py-4">

        <div>
            <h1 class="text-2xl font-semibold text-gray-800">
                @if(request()->routeIs('profile.edit') && request()->has('mode') && request('mode') === 'edit')
                    Edit Profil
                @elseif(request()->routeIs('profile.edit'))
                    Profil
                @elseif(request()->routeIs('users.*') || request()->routeIs('client-role.*'))
                    Manajemen Akun
                @else
                    Selamat Datang
                @endif
            </h1>
        </div>

        <div x-data="{ open: false }" class="relative">

            <div class="flex items-center gap-3 cursor-pointer" @click="open = !open">
                <!-- User Avatar -->
                <svg
                    class="w-12 h-12 rounded-full border-2 border-gray-200 shadow-lg transition-transform hover:scale-105"
                    viewBox="0 0 36 36"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <circle cx="18" cy="18" r="18" fill="#459FFF"/>
                    <path
                        d="M17.9997 17.9987C19.8413 17.9987 21.333 16.507 21.333 14.6654C21.333 12.8237 19.8413 11.332 17.9997 11.332C16.158 11.332 14.6663 12.8237 14.6663 14.6654C14.6663 16.507 16.158 17.9987 17.9997 17.9987ZM17.9997 19.6654C15.7747 19.6654 11.333 20.782 11.333 22.9987V24.6654H24.6663V22.9987C24.6663 20.782 20.2247 19.6654 17.9997 19.6654Z"
                        fill="white"/>
                </svg>

                <div class="text-lg text-gray-800 font-semibold select-none">
                    {{ Auth::user()->name ?? 'User' }}
                </div>
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
                    class="flex items-center px-4 py-2 text-md rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 mr-2">
                        <path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z"></path>
                    </svg>
                    Profile
                </a>
            </div>
        </div>
    </div>
</div>
