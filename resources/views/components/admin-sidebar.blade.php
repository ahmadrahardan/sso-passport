<div class="w-64 bg-blue-600 text-white shadow-lg flex flex-col sticky top-0 h-screen">

    <div class="border-b border-white h-20 flex items-center justify-center">
        <img src="{{ asset('images/logowhite.png') }}" alt="Logo RSDB" class="h-[65px] w-auto object-contain">
    </div>

    <nav class="flex-1 mt-4">
        <ul class="space-y-1">

            <li>
                <a href="{{ route('users.index') }}"
                    class="block px-6 py-3 hover:bg-blue-600
                            {{ request()->is('users*') ? 'bg-blue-600' : '' }}">
                    Manajemen Akun
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}"
                    class="block px-6 py-3 hover:bg-blue-600
                            {{ request()->is('users*') ? 'bg-blue-600' : '' }}">
                    Dashboard
                </a>
            </li>

            {{-- <li>
                <a href="{{ route('clients.index') }}"
                    class="block px-6 py-3 hover:bg-blue-600
                        {{ request()->is('clients*') ? 'bg-blue-600' : '' }}">
                            Kelola Client
                </a>
            </li> --}}

        </ul>
    </nav>

    <div class="p-5 border-t border-blue-600">
        <a href="{{ route('sso.logout') }}" class="block bg-red-500 text-center py-2 rounded-md hover:bg-red-600">
            Logout
        </a>
    </div>
</div>
