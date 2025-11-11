<div class="h-full">
    <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6 justify-start items-start h-full">
        @forelse($apps as $app)
            <div class="relative w-72">
                <a href="{{ $app['url'] ?? '#' }}"
                    class="block bg-gradient-to-br from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700
                        rounded-2xl shadow-2xl hover:shadow-3xl p-6 cursor-pointer transform transition-all duration-300 hover:-translate-y-1 hover:scale-[1.02]">

                    <div class="mb-3 flex justify-center">
                        <img src="{{ asset('images/Logo Simba.png') }}" alt="SIMBA Logo" class="h-16 w-auto">
                    </div>

                    <div class="text-center">
                        <h3 class="text-white font-bold text-lg mb-1">{{ $app['name'] }}</h3>
                        <p class="text-white text-xs opacity-90 leading-tight">
                            {{ $app['desc'] ?? 'Aplikasi terintegrasi Single Sign-On' }}
                        </p>
                    </div>
                </a>
            </div>
        @empty
            <p class="text-gray-500 text-center col-span-full py-10">
                Belum ada aplikasi yang terdaftar.
            </p>
        @endforelse
    </div>
</div>
