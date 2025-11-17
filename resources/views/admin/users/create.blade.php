<x-admin-layout title="Tambah User Baru">

    <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-md">

        <h2 class="text-xl font-bold mb-6 border-b pb-2">
            Tambah User Baru
        </h2>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            {{-- Nama --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">

                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">

                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-6">
                <label class="block font-semibold mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">

                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Simpan
                </button>

                <a href="{{ route('users.index') }}" class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">
                    Batal
                </a>
            </div>

        </form>

    </div>

</x-admin-layout>
