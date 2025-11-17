<x-admin-layout title="Role User per Client">

    <div class="max-w-5xl mx-auto">

        {{-- Header --}}
        <h2 class="text-xl font-bold mb-6 border-b pb-2">
            Role User per Client: <span class="text-blue-600">{{ $user->name }}</span>
        </h2>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form Tambah Role --}}
        <div class="bg-white p-6 rounded-xl shadow mb-8">

            <form method="POST" action="{{ route('client-role.store', $user) }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    {{-- CLIENT --}}
                    <div>
                        <label class="block font-semibold mb-1">Pilih Client</label>
                        <select name="client_id"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">-- pilih client --</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- ROLE --}}
                    <div>
                        <label class="block font-semibold mb-1">Pilih Role</label>
                        <select name="role_id"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">-- pilih role --</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- BUTTON --}}
                    <div class="flex items-end">
                        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                            Simpan Role
                        </button>
                    </div>

                </div>

            </form>

        </div>


        {{-- Tabel Role Saat Ini --}}
        <div class="bg-white p-6 rounded-xl shadow">

            <h3 class="text-lg font-semibold mb-4">Role User Saat Ini</h3>

            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b text-gray-600">
                        <th class="py-2">Client</th>
                        <th class="py-2">Role</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($clients as $client)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2">{{ $client->name }}</td>
                            <td class="py-2">
                                {{ $clientRoles[$client->id]->role->name ?? '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</x-admin-layout>
