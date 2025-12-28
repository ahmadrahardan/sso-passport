<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/logoRSDB.png') }}" type="image/png">

    <title>{{ $title ?? 'Admin Panel' }} - {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/admin.js'])
</head>

<body class="bg-gradient-to-t from-blue-100 to-indigo-50">

    <div class="flex min-h-screen">

        {{-- ============= SIDEBAR ============= --}}
        <aside>
            <x-admin-sidebar></x-admin-sidebar>
        </aside>

        {{-- ============= CONTENT ============= --}}
        <div class="flex-1 flex flex-col">
            <div class="sticky top-0 z-10 bg-white shadow-md">
                <x-admin-header></x-admin-header>
            </div>

            <main class="flex-1 p-4">
                {{ $slot }}
            </main>
        </div>

    </div>

</body>

</html>
