<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="grid md:grid-cols-3 gap-4">
            @forelse($apps as $app)
                <a href="{{ $app['url'] }}" class="block border rounded-xl p-4 hover:bg-gray-50">
                    <div class="text-lg font-semibold">{{ $app['name'] }}</div>
                    <div class="text-sm text-gray-500">{{ $app['desc'] ?? '' }}</div>
                </a>
            @empty
                <p class="text-gray-500">Belum ada aplikasi.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
