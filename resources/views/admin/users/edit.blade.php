{{-- <x-admin-layout title="Edit User">

    <div class="py-4 px-8">
        <div class="bg-blue-600 py-6 text-center rounded-t-xl">
            <h1 class="text-white text-2xl font-bold tracking-wide">
                EDIT USER
            </h1>
        </div>

        <div class="px-8 py-10 bg-gray-100 rounded-b-xl">
            <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-10">
                @csrf
                @method('PUT')

                <!-- GRID 2 KOLOM -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <!-- Nama -->


                </div>

                <!-- Password -->
                <div class="w-full md:w-1/2">
                    <label class="block font-semibold text-gray-700 mb-2">
                        Password <span class="text-gray-500 text-sm">(Kosongkan jika tidak diganti)</span>
                    </label>

                    <input type="password" name="password" placeholder="Password Baru"
                        class="w-full px-4 py-3 rounded-xl border focus:ring-blue-500 focus:border-blue-500">

                    @error('password')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol -->
                <div class="flex justify-end pt-6">
                    <button type="submit"
                        class="bg-teal-500 hover:bg-teal-600 text-white px-10 py-3 rounded-xl font-semibold">
                        Selesai
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-admin-layout> --}}


<x-admin-layout title="Edit User">

    <div class="py-4 px-8">
        <div class="bg-blue-600 py-6 text-center rounded-t-xl">
            <h1 class="text-white text-2xl font-bold tracking-wide">
                EDIT USER
            </h1>
        </div>

        <div class="px-6 py-2 bg-gray-100 rounded-b-xl">

            <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-8">
                @csrf

                <!-- GRID 2 KOLOM -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-7">

                    <!-- Username -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Username</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="w-full px-4 py-3 rounded-xl border focus:ring-blue-500 focus:border-blue-500">

                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full px-4 py-3 rounded-xl border focus:ring-blue-500 focus:border-blue-500">

                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">
                            Password <span class="text-gray-500 text-sm">(Kosongkan jika tidak diganti)</span>
                        </label>

                        <input type="password" name="password" placeholder="Password Baru"
                            class="w-full px-4 py-3 rounded-xl border focus:ring-blue-500 focus:border-blue-500">

                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div></div>
                </div>

                <!-- Tombol -->
                <div class="flex justify-end pb-4 pt-20">
                    <button type="submit"
                        class="bg-teal-500 hover:bg-teal-600 text-white px-10 py-3 rounded-xl font-semibold">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</x-admin-layout>
