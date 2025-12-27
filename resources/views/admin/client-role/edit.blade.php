<x-admin-layout title="Edit User">

    <x-notification-success />

    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-t-2xl shadow-lg">
            <div class="flex items-center gap-4 px-8 py-6">
                <div class="">
                    <svg width="68" height="68" viewBox="0 0 68 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="68" height="68" rx="8" fill="#459FFF"/>
                        <path d="M34 10C27.376 10 22 15.376 22 22C22 28.624 27.376 34 34 34C40.624 34 46 28.624 46 22C46 15.376 40.624 10 34 10ZM39.208 20.824L32.728 27.304C32.488 27.544 31.984 27.784 31.648 27.856L29.176 28.192C28.264 28.312 27.64 27.688 27.784 26.8L28.144 24.328C28.192 23.992 28.432 23.488 28.696 23.248L35.176 16.768C36.28 15.664 37.6 15.136 39.232 16.768C40.84 18.424 40.312 19.72 39.208 20.824Z" fill="#FDFDFD"/>
                        <path d="M34 39C21.8746 39 12 46.98 12 56.8125C12 57.4775 12.5325 58 13.2101 58H54.7899C55.4675 58 56 57.4775 56 56.8125C56 46.98 46.1254 39 34 39Z" fill="#FDFDFD"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-white text-2xl font-bold">Edit Role User</h1>
                    <p class="text-blue-100 text-sm mt-1">Kelola role dan hak akses pengguna sistem</p>
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div class="bg-white rounded-b-2xl shadow-lg p-8">

            {{-- Role User Saat Ini Section --}}
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <div class="flex items-center gap-2">
                        <svg width="24" height="18" viewBox="0 0 28 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.57667 1.75H25.75M8.57667 10.7411H25.75M8.57667 19.7322H25.75M1.75 1.75V1.76776M1.75 10.7411V10.7589M1.75 19.7322V19.75" stroke="#057CFF" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Role User Saat Ini</h2>
                </div>

                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Client</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Role</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($clients as $client)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $client->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $clientRoles[$client->id]->role->name ?? '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Edit Role User Section --}}
            <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="flex items-center gap-3 mb-6">
                    <svg width="24" height="24" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.4601 25.394H4.48669C2.83718 25.394 1.49999 24.0567 1.5 22.4072L1.50012 4.48674C1.50013 2.83721 2.83732 1.5 4.48682 1.5H17.9273C19.5768 1.5 20.914 2.83722 20.914 4.48676V10.4603M6.7272 7.47351H15.6873M6.7272 11.9536H15.6873M6.7272 16.4338H11.2073M14.9404 21.2761L21.2762 14.9402L25.5 19.1641L19.1642 25.5H14.9404V21.2761Z" stroke="#057CFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <h2 class="text-xl font-bold text-gray-900">Edit Role User</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Pilih Client --}}
                    <div>
                        <label class="flex items-center gap-2 text-gray-700 font-medium mb-2">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.00016 1.33203C6.2535 1.33203 4.8335 2.75203 4.8335 4.4987C4.8335 6.21203 6.1735 7.5987 7.92016 7.6587C7.9735 7.65203 8.02683 7.65203 8.06683 7.6587C8.08016 7.6587 8.08683 7.6587 8.10016 7.6587C8.10683 7.6587 8.10683 7.6587 8.1135 7.6587C9.82016 7.5987 11.1602 6.21203 11.1668 4.4987C11.1668 2.75203 9.74683 1.33203 8.00016 1.33203Z" fill="#292D32"/>
                                <path d="M11.3866 9.43391C9.52664 8.19391 6.49331 8.19391 4.61997 9.43391C3.77331 10.0006 3.30664 10.7672 3.30664 11.5872C3.30664 12.4072 3.77331 13.1672 4.61331 13.7272C5.54664 14.3539 6.77331 14.6672 7.99997 14.6672C9.22664 14.6672 10.4533 14.3539 11.3866 13.7272C12.2266 13.1606 12.6933 12.4006 12.6933 11.5739C12.6866 10.7539 12.2266 9.99391 11.3866 9.43391Z" fill="#292D32"/>
                            </svg>
                            Pilih Client
                        </label>
                        <select
                            name="client_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none bg-white cursor-pointer"
                            required>
                            <option value="">Pilih client</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Pilih Role --}}
                    <div>
                        <label class="flex items-center gap-2 text-gray-700 font-medium mb-2">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.00016 1.33203C4.2535 1.33203 2.8335 2.75203 2.8335 4.4987C2.8335 6.21203 4.1735 7.5987 5.92016 7.6587C5.9735 7.65203 6.02683 7.65203 6.06683 7.6587C6.08016 7.6587 6.08683 7.6587 6.10016 7.6587C6.10683 7.6587 6.10683 7.6587 6.1135 7.6587C7.82016 7.5987 9.16016 6.21203 9.16683 4.4987C9.16683 2.75203 7.74683 1.33203 6.00016 1.33203Z" fill="#292D32"/>
                                <path d="M9.38664 9.43391C7.52664 8.19391 4.49331 8.19391 2.61997 9.43391C1.77331 10.0006 1.30664 10.7672 1.30664 11.5872C1.30664 12.4072 1.77331 13.1672 2.61331 13.7272C3.54664 14.3539 4.77331 14.6672 5.99997 14.6672C7.22664 14.6672 8.45331 14.3539 9.38664 13.7272C10.2266 13.1606 10.6933 12.4006 10.6933 11.5739C10.6866 10.7539 10.2266 9.99391 9.38664 9.43391Z" fill="#292D32"/>
                                <path d="M13.3267 4.8921C13.4334 6.18543 12.5134 7.31876 11.2401 7.4721C11.2334 7.4721 11.2334 7.4721 11.2267 7.4721H11.2067C11.1667 7.4721 11.1267 7.4721 11.0934 7.48543C10.4467 7.51876 9.8534 7.3121 9.40674 6.9321C10.0934 6.31876 10.4867 5.39876 10.4067 4.39876C10.3601 3.85876 10.1734 3.36543 9.89341 2.94543C10.1467 2.81876 10.4401 2.73876 10.7401 2.7121C12.0467 2.59876 13.2134 3.5721 13.3267 4.8921Z" fill="#292D32"/>
                                <path d="M14.66 11.059C14.6067 11.7056 14.1933 12.2656 13.5 12.6456C12.8333 13.0123 11.9933 13.1856 11.16 13.1656C11.64 12.7323 11.92 12.1923 11.9733 11.619C12.04 10.7923 11.6467 9.99896 10.86 9.36563C10.4133 9.0123 9.89333 8.7323 9.32666 8.52563C10.8 8.09896 12.6533 8.38563 13.7933 9.30563C14.4067 9.79896 14.72 10.419 14.66 11.059Z" fill="#292D32"/>
                            </svg>
                            Pilih Role
                        </label>
                        <select
                            name="role_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent appearance-none bg-white cursor-pointer"
                            required>
                            <option value="">Pilih role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-end pt-6">
                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-12 py-3 rounded-lg font-semibold shadow-md hover:shadow-lg transition-all duration-200">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

    {{-- Arrow Style --}}
    <style>
        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }
    </style>

</x-admin-layout>
