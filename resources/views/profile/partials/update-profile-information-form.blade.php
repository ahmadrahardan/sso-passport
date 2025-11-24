<div class="w-full">
    <!-- HEADER BIRU -->
    <div class="bg-blue-600 py-6 text-center text-white text-2xl font-bold tracking-wide rounded-t-xl">
        EDIT PROFIL
    </div>

    <section class="px-6 py-1 bg-gray-100 rounded-b-xl relative">

        <form method="post" action="{{ route('profile.update') }}" class="space-y-8">
            @csrf
            @method('patch')

            <!-- GRID 2 KOLOM -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-7">

                <!-- USERNAME -->
                <div>
                    <label for="name" class="block font-semibold text-gray-700 mb-2">Username</label>
                    <input id="name" name="name" type="text"
                        class="w-full border rounded-xl px-4 py-3 text-gray-700 focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('name', $user->name) }}" />
                    <x-input-error class="mt-1" :messages="$errors->get('name')" />
                </div>

                <!-- EMAIL -->
                <div>
                    <label for="email" class="block font-semibold text-gray-700 mb-2">Email</label>
                    <input id="email" name="email" type="email"
                        class="w-full border rounded-xl px-4 py-3 text-gray-700 focus:ring-blue-500 focus:border-blue-500"
                        value="{{ old('email', $user->email) }}" />
                    <x-input-error class="mt-1" :messages="$errors->get('email')" />
                </div>

                <!-- PASSWORD BARU -->
                <div>
                    <label for="password" class="block font-semibold text-gray-700 mb-2">Password Baru</label>
                    <input id="password" name="password" type="password"
                        class="w-full border rounded-xl px-4 py-3 text-gray-700 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="•••••••" />
                    <x-input-error class="mt-1" :messages="$errors->get('password')" />
                </div>

                <!-- KONFIRMASI PASSWORD -->
                <div>
                    <label for="password_confirmation" class="block font-semibold text-gray-700 mb-2">
                        Konfirmasi Password
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        class="w-full border rounded-xl px-4 py-3 text-gray-700 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="•••••••" />
                </div>
            </div>

            <!-- BUTTON POJOK KANAN -->
            <div class="flex justify-end pt-24 pb-4">
                <button type="submit"
                    class="bg-teal-500 hover:bg-teal-600 text-white font-semibold px-10 py-3 rounded-xl">
                    Simpan
                </button>
            </div>
        </form>
    </section>
</div>
