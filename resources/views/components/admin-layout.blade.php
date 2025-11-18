{{-- resources/views/components/admin-layout.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Admin Panel' }} - {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        {{-- ============= SIDEBAR ============= --}}
        <aside class="w-64 bg-blue-700 text-white shadow-lg flex flex-col">

            {{-- Logo --}}
            <div class="p-5 border-b border-blue-600 flex items-center gap-3">
                <img src="/logo.png" class="h-10 w-10 bg-white rounded-md p-1" alt="Logo">
                <span class="font-bold text-xl">SIMBA</span>
            </div>

            {{-- Menu --}}
            <nav class="flex-1 mt-4">
                <ul class="space-y-1">

                    {{-- Users --}}
                    <li>
                        <a href="{{ route('users.index') }}"
                            class="block px-6 py-3 hover:bg-blue-600
                            {{ request()->is('users*') ? 'bg-blue-600' : '' }}">
                            Kelola Akun
                        </a>
                    </li>

                    {{-- Clients --}}
                    {{-- <li>
                        <a href="{{ route('clients.index') }}"
                            class="block px-6 py-3 hover:bg-blue-600
                            {{ request()->is('clients*') ? 'bg-blue-600' : '' }}">
                            Kelola Client
                        </a>
                    </li> --}}

                </ul>
            </nav>

            {{-- Logout --}}
            {{-- <div class="p-5 border-t border-blue-600">
                <a href="{{ route('sso.logout') }}"
                    class="block bg-red-500 text-center py-2 rounded-md hover:bg-red-600">
                    Logout
                </a>
            </div> --}}
        </aside>

        {{-- ============= CONTENT ============= --}}
        <div class="flex-1 flex flex-col">
            <x-admin-header />

            <main class="flex-1 p-8">
                {{ $slot }}
            </main>
        </div>

    </div>

</body>

</html>
