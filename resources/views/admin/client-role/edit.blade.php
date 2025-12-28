<x-admin-layout title="Edit User">

    <x-notification-success />

    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-t-2xl shadow-lg">
            <div class="flex items-center gap-4 px-8 py-6">
                <svg width="68" height="68" viewBox="0 0 68 68" fill="none">
                    <rect width="68" height="68" rx="8" fill="#459FFF"/>
                    <path d="M34 10C27.376 10 22 15.376 22 22C22 28.624 27.376 34 34 34C40.624 34 46 28.624 46 22C46 15.376 40.624 10 34 10Z" fill="white"/>
                    <path d="M34 39C21.875 39 12 46.98 12 56.8125C12 57.48 12.53 58 13.21 58H54.79C55.47 58 56 57.48 56 56.8125C56 46.98 46.125 39 34 39Z" fill="white"/>
                </svg>

                <div>
                    <h1 class="text-white text-2xl font-bold">Edit Role User</h1>
                    <p class="text-blue-100 text-sm mt-1">
                        Kelola role dan hak akses pengguna sistem
                    </p>
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="bg-white rounded-b-2xl shadow-lg p-8">

            {{-- Role Saat Ini --}}
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-900 mb-4">
                    Role User Saat Ini
                </h2>

                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                                    Client
                                </th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                                    Role
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($clients as $client)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        {{ $client->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $clientRoles[$client->id]->role->name ?? '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Form Edit Role --}}
            <form
                action="{{ route('users.update', $user) }}"
                method="POST"
                id="editUserRoleForm"
                class="space-y-6"
                onsubmit="return validateEditUserRoleForm()"
            >
                @csrf
                @method('PUT')

                <h2 class="text-xl font-bold text-gray-900">
                    Edit Role User
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Client --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">
                            Pilih Client
                        </label>
                        <select
                            name="client_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                        >
                            <option value="">Pilih client</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">
                                    {{ $client->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Role --}}
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">
                            Pilih Role
                        </label>
                        <select
                            name="role_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                        >
                            <option value="">Pilih role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="flex justify-end pt-6">
                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-12 py-3 rounded-lg font-semibold shadow-md transition"
                    >
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>

</x-admin-layout>
