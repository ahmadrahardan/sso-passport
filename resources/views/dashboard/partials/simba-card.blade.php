<div class="h-full">
    <div class="flex flex-wrap gap-12 justify-start items-start h-full">

        {{-- Card Dummy untuk Super Admin --}}
        @if(Auth::user()->hasRole('super-admin'))
            <div class="relative w-full sm:w-72 md:w-80">
                <a href="{{ url('/users') }}"
                    class="block bg-gradient-to-br from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700
                        rounded-2xl shadow-2xl hover:shadow-3xl p-6 cursor-pointer transform transition-all duration-300 hover:-translate-y-1 hover:scale-[1.02]">

                    <div class="mb-3 flex justify-center">
                        <img src="{{ asset('images/logowhite.png') }}" alt="SIMBA Logo" class="h-16 w-auto">
                    </div>

                    <div class="text-center">
                        <h3 class="text-white font-bold text-lg mb-1">Manajemen Akun</h3>
                        <p class="text-white text-xs opacity-90 leading-tight">
                            Manajemen akun pengguna
                        </p>
                    </div>
                </a>
            </div>
        @endif

        {{-- Loop untuk Menampilkan Aplikasi --}}
        @forelse($apps as $app)
            <div class="relative w-full sm:w-72 md:w-80">
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
