<x-admin-layout title="Profil">

    <x-notification-success />

    <div class="max-w-7xl mx-auto">

        <div class="bg-gradient-to-br from-blue-500 via-blue-600 to-blue-700 rounded-2xl shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-400/20 rounded-full -mr-48 -mt-48"></div>
            <div class="absolute bottom-0 right-20 w-64 h-64 bg-blue-800/20 rounded-full"></div>

            <div class="relative px-10 py-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-6">
                        {{-- Avatar --}}
                        <div class="relative">
                            <div class="">
                                <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="60" cy="60" r="59" fill="#459FFF" stroke="#FDFDFD" stroke-width="2"/>
                                    <path d="M60.0002 59.9987C69.5768 59.9987 77.3335 52.242 77.3335 42.6654C77.3335 33.0887 69.5768 25.332 60.0002 25.332C50.4235 25.332 42.6668 33.0887 42.6668 42.6654C42.6668 52.242 50.4235 59.9987 60.0002 59.9987ZM60.0002 68.6654C48.4302 68.6654 25.3335 74.472 25.3335 85.9987V94.6654H94.6668V85.9987C94.6668 74.472 71.5702 68.6654 60.0002 68.6654Z" fill="white"/>
                                </svg>
                            </div>
                        </div>

                        <div>
                            <h1 class="text-white text-3xl font-bold">{{ $user->name }}</h1>
                            <p class="text-blue-100 text-base mt-1">Administrator Sistem RSUD Balung</p>
                        </div>
                    </div>

                    {{-- Edit Button --}}
                    <a href="{{ route('profile.edit', ['mode' => 'edit']) }}"
                        class="inline-flex items-center gap-2 bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold shadow-lg hover:shadow-xl transition-all duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                        </svg>
                        Edit Profil
                    </a>
                </div>
            </div>
        </div>

        {{-- Profile Information Card --}}
        <div class="bg-white rounded-2xl shadow-lg mt-4 p-8">

            <h2 class="text-2xl font-bold text-gray-900 mb-8">Informasi Profil</h2>

            <div class="space-y-6">

                {{-- Username --}}
                <div class="flex items-start border-b border-gray-100">
                    <div class="w-40 flex-shrink-0">
                        <span class="text-gray-600 font-medium">Username</span>
                    </div>
                    <div class="flex-1 flex items-center gap-3">
                        <span class="text-gray-900 font-medium">:</span>
                        <span class="text-gray-900 text-lg">{{ $user->name }}</span>
                    </div>
                </div>

                {{-- Role --}}
                <div class="flex items-start border-b border-gray-100">
                    <div class="w-40 flex-shrink-0">
                        <span class="text-gray-600 font-medium">Role</span>
                    </div>
                    <div class="flex-1 flex items-center gap-3">
                        <span class="text-gray-900 font-medium">:</span>
                        <span class="text-gray-900 text-lg">Super Admin</span>
                    </div>
                </div>

                {{-- Email --}}
                <div class="flex items-start">
                    <div class="w-40 flex-shrink-0">
                        <span class="text-gray-600 font-medium">Email</span>
                    </div>
                    <div class="flex-1 flex items-center gap-3">
                        <span class="text-gray-900 font-medium">:</span>
                        <span class="text-gray-900 text-lg">{{ $user->email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
