<div class="w-full flex flex-col h-full max-w-md mx-auto">
    <div class="flex-1 flex flex-col items-center justify-center space-y-6">

        <div class="relative mb-2">
            <div class="w-28 h-28 rounded-full bg-white p-1 shadow-xl">
                <div class="w-full h-full rounded-full bg-white flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/RSDB.png') }}" alt="Profile" class="w-26 h-26 object-contain">
                </div>
            </div>
        </div>

        <div class="text-center">
            <h2 class="text-2xl font-bold text-white mb-2">{{ Auth::user()->name ?? 'User' }}</h2>
            <span class="inline-block px-4 py-1.5 bg-green-500 text-white text-xs font-semibold rounded-full shadow-md">
                Online
            </span>
        </div>

        <div class="w-full space-y-3 mt-6">

            <!-- Email Card -->
            <div
                class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0 mt-0.5">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-medium text-blue-200 mb-1">Email</p>
                        <p class="text-white text-sm font-medium truncate">{{ Auth::user()->email ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Address Card -->
            <div
                class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-all duration-300">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0 mt-0.5">
                        <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-medium text-blue-200 mb-1">Alamat</p>
                        <p class="text-white text-sm font-medium leading-relaxed">
                            Jl Rambipuji No.19, Karang Semper, Jawa Timur
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Logout Button -->
    <div class="mt-8 text-center">
        <a href="{{ route('sso.logout') }}"
            class="inline-block bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700
              text-white font-semibold py-3 px-8 rounded-xl shadow-lg hover:shadow-xl
              transition-all duration-300">
            Logout
        </a>
    </div>

</div>
