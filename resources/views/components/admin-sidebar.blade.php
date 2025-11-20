<div class="w-64 bg-gradient-to-t from-blue-900 to-blue-600 text-white shadow-lg flex flex-col sticky top-0 h-screen">

    <div class="border-b border-white h-20 flex items-center justify-center">
        <img src="{{ asset('images/logowhite.png') }}" alt="Logo RSDB" class="h-[65px] w-auto object-contain">
    </div>

    <nav class="flex-1 mt-4">
        <ul class="space-y-3">

            {{-- <li>
                <a href="{{ route('users.index') }}"
                    class="block px-6 py-3 hover:bg-blue-600
                            {{ request()->is('users*') ? 'bg-blue-600' : '' }}">
                    Manajemen Akun
                </a>
            </li> --}}

            <li class="px-4 rounded-lg">
                <a href="{{ route('users.index') }}"
                    class="px-4 py-3 text-md font-semibold hover:bg-blue-400 rounded-2xl flex items-center
                            {{ request()->is('users*') ? 'bg-blue-500' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 mr-2"><path d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM12.1597 16C10.1243 16 8.29182 16.8687 7.01276 18.2556C8.38039 19.3474 10.114 20 12 20C13.9695 20 15.7727 19.2883 17.1666 18.1081C15.8956 16.8074 14.1219 16 12.1597 16ZM12 4C7.58172 4 4 7.58172 4 12C4 13.8106 4.6015 15.4807 5.61557 16.8214C7.25639 15.0841 9.58144 14 12.1597 14C14.6441 14 16.8933 15.0066 18.5218 16.6342C19.4526 15.3267 20 13.7273 20 12C20 7.58172 16.4183 4 12 4ZM12 5C14.2091 5 16 6.79086 16 9C16 11.2091 14.2091 13 12 13C9.79086 13 8 11.2091 8 9C8 6.79086 9.79086 5 12 5ZM12 7C10.8954 7 10 7.89543 10 9C10 10.1046 10.8954 11 12 11C13.1046 11 14 10.1046 14 9C14 7.89543 13.1046 7 12 7Z"></path></svg>
                    Manajemen Akun
                </a>
            </li>

            <li class="px-4 rounded-lg">
                <a href="{{ route('dashboard') }}"
                    class="px-4 py-3 text-md font-semibold hover:bg-blue-400 rounded-2xl flex items-center
                            {{ request()->is('dashboard*') ? 'bg-blue-500' : '' }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 mr-2"><path d="M14 21C13.4477 21 13 20.5523 13 20V12C13 11.4477 13.4477 11 14 11H20C20.5523 11 21 11.4477 21 12V20C21 20.5523 20.5523 21 20 21H14ZM4 13C3.44772 13 3 12.5523 3 12V4C3 3.44772 3.44772 3 4 3H10C10.5523 3 11 3.44772 11 4V12C11 12.5523 10.5523 13 10 13H4ZM9 11V5H5V11H9ZM4 21C3.44772 21 3 20.5523 3 20V16C3 15.4477 3.44772 15 4 15H10C10.5523 15 11 15.4477 11 16V20C11 20.5523 10.5523 21 10 21H4ZM5 19H9V17H5V19ZM15 19H19V13H15V19ZM13 4C13 3.44772 13.4477 3 14 3H20C20.5523 3 21 3.44772 21 4V8C21 8.55228 20.5523 9 20 9H14C13.4477 9 13 8.55228 13 8V4ZM15 5V7H19V5H15Z"></path></svg>
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

    {{-- <div class="p-5 border-t border-blue-600">
        <a href="{{ route('sso.logout') }}" class="block bg-red-500 text-center py-2 rounded-md hover:bg-red-600">
            Logout
        </a>
    </div> --}}
</div>
