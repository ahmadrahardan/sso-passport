<x-admin-layout title="Edit User">

    <x-notification-success />

    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-t-2xl shadow-lg">
            <div class="flex items-center gap-4 px-8 py-6">
                <div>
                    <svg width="68" height="68" viewBox="0 0 68 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="68" height="68" rx="8" fill="#459FFF"/>
                        <path d="M34 10C27.376 10 22 15.376 22 22C22 28.624 27.376 34 34 34C40.624 34 46 28.624 46 22C46 15.376 40.624 10 34 10ZM39.208 20.824L32.728 27.304C32.488 27.544 31.984 27.784 31.648 27.856L29.176 28.192C28.264 28.312 27.64 27.688 27.784 26.8L28.144 24.328C28.192 23.992 28.432 23.488 28.696 23.248L35.176 16.768C36.28 15.664 37.6 15.136 39.232 16.768C40.84 18.424 40.312 19.72 39.208 20.824Z" fill="#FDFDFD"/>
                        <path d="M34 39C21.8746 39 12 46.98 12 56.8125C12 57.4775 12.5325 58 13.2101 58H54.7899C55.4675 58 56 57.4775 56 56.8125C56 46.98 46.1254 39 34 39Z" fill="#FDFDFD"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-white text-2xl font-bold">Form Edit Data Akun</h1>
                    <p class="text-blue-100 text-sm mt-1">Perbarui informasi dibawah ini</p>
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="bg-white rounded-b-2xl shadow-lg p-8">

            <div class="mb-8 bg-blue-50 border-l-8 border-blue-500 rounded-lg p-4">
                <div class="flex items-start gap-3">
                    <div>
                        <svg width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_4461_10868)">
                                <rect x="1" width="51" height="51" rx="10" fill="#CED8F7"/>
                                <path d="M25.5023 10.418C16.0894 10.418 8.41895 18.0884 8.41895 27.5013C8.41895 36.9142 16.0894 44.5846 25.5023 44.5846C34.9152 44.5846 42.5856 36.9142 42.5856 27.5013C42.5856 18.0884 34.9152 10.418 25.5023 10.418ZM24.221 20.668C24.221 19.9676 24.8019 19.3867 25.5023 19.3867C26.2027 19.3867 26.7835 19.9676 26.7835 20.668V29.2096C26.7835 29.9101 26.2027 30.4909 25.5023 30.4909C24.8019 30.4909 24.221 29.9101 24.221 29.2096V20.668ZM27.0739 34.9838C26.9885 35.2059 26.8689 35.3767 26.7152 35.5476C26.5444 35.7013 26.3564 35.8209 26.1514 35.9063C25.9464 35.9917 25.7244 36.043 25.5023 36.043C25.2802 36.043 25.0581 35.9917 24.8531 35.9063C24.6481 35.8209 24.4602 35.7013 24.2894 35.5476C24.1356 35.3767 24.016 35.2059 23.9306 34.9838C23.8452 34.7788 23.7939 34.5567 23.7939 34.3346C23.7939 34.1126 23.8452 33.8905 23.9306 33.6855C24.016 33.4805 24.1356 33.2926 24.2894 33.1217C24.4602 32.968 24.6481 32.8484 24.8531 32.763C25.2631 32.5921 25.7414 32.5921 26.1514 32.763C26.3564 32.8484 26.5444 32.968 26.7152 33.1217C26.8689 33.2926 26.9885 33.4805 27.0739 33.6855C27.1594 33.8905 27.2106 34.1126 27.2106 34.3346C27.2106 34.5567 27.1594 34.7788 27.0739 34.9838Z" fill="#046CE2"/>
                            </g>
                            <defs>
                                <filter id="filter0_d_4461_10868" x="0" y="0" width="51" height="51" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                    <feOffset dy="1"/>
                                    <feGaussianBlur stdDeviation="0.5"/>
                                    <feComposite in2="hardAlpha" operator="out"/>
                                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_4461_10868"/>
                                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_4461_10868" result="shape"/>
                                </filter>
                            </defs>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-1">Informasi Penting</h3>
                        <p class="text-gray-600 text-sm">Pastikan semua data yang dimasukkan sudah benar dan valid. Perubahan data akan langsung diterapkan di sistem SSO</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="flex items-center gap-3 mb-6">
                    <div>
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="8" fill="#CED8F7"/>
                            <rect x="8" y="8" width="24" height="24" rx="12" fill="#006FFF"/>
                            <path d="M20 20C22.21 20 24 18.21 24 16C24 13.79 22.21 12 20 12C17.79 12 16 13.79 16 16C16 18.21 17.79 20 20 20ZM20 22C17.33 22 12 23.34 12 26V28H28V26C28 23.34 22.67 22 20 22Z" fill="white"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Informasi Akun</h2>
                </div>

                {{-- Form --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Username --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">
                            <span class="text-red-500">*</span> Username
                        </label>
                        <input
                            type="text"
                            name="name"
                            placeholder="Masukkan username"
                            value="{{ old('name', $user->name) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-600 text-sm mt-2 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                    <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 15V17H13V15H11ZM11 7V13H13V7H11Z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">
                            <span class="text-red-500">*</span> Email
                        </label>
                        <input
                            type="email"
                            name="email"
                            placeholder="Masukkan email"
                            value="{{ old('email', $user->email) }}" {{-- Gunakan value dari user --}}
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="text-red-600 text-sm mt-2 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                    <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 15V17H13V15H11ZM11 7V13H13V7H11Z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                {{-- Password Field --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        Password <span class="text-gray-500 text-sm font-normal">(Kosongkan jika tidak ingin mengubah password)</span>
                    </label>
                    <div class="relative w-full md:w-1/2">
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Masukkan password baru"
                            class="w-full px-4 py-3 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('password') border-red-500 @enderror">
                        <button
                            type="button"
                            onclick="togglePassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700">
                            <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eye-off-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-600 text-sm mt-2 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 15V17H13V15H11ZM11 7V13H13V7H11Z"></path>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Footer Section --}}
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <div>
                        <p class="text-sm text-gray-600">
                            <span class="text-red-500 font-semibold">*</span> Menandakan field wajib diisi
                        </p>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-12 py-3 rounded-lg font-semibold shadow-md hover:shadow-lg transition-all duration-200">
                            Selesai
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</x-admin-layout>
