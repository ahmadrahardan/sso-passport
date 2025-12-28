<div class="w-64 bg-gradient-to-t from-blue-900 to-blue-600 text-white shadow-lg flex flex-col sticky top-0 h-screen">

    <div class="border-b border-white h-20 flex items-center justify-center">
        <img src="{{ asset('images/logowhite.png') }}" alt="Logo RSDB" class="h-[65px] w-auto object-contain">
    </div>

    <nav class="flex-1 px-4 py-6">
        <ul class="space-y-2">

            <li>
                <a href="{{ route('dashboard') }}"
                    class="px-4 py-3 text-sm font-medium rounded-lg flex items-center transition-colors
                            {{ request()->is('dashboard*') ? 'bg-blue-500' : 'hover:bg-blue-500' }}">
                    <x-icons.dashboard class="mr-3" />
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('users.index') }}"
                    class="px-4 py-3 text-sm font-medium rounded-lg flex items-center transition-colors
                            {{ request()->is('users*') ? 'bg-blue-500' : 'hover:bg-blue-500' }}">
                    <x-icons.kelolaakun class="mr-3" />
                    Kelola Akun
                </a>
            </li>
        </ul>
    </nav>

    <div class="border-t border-white h-20 px-4 py-4">
        <a href="{{ route('sso.logout') }}"
           class="px-4 py-3 text-sm font-medium rounded-lg flex items-center hover:bg-blue-500 transition-colors">
            <x-icons.logout class="mr-3" />
            Logout
        </a>
    </div>
</div>
