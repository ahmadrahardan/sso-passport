<x-admin-layout title="Kelola Akun">

    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="absolute top-24 right-6 bg-emerald-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 z-50">

            <span class="font-medium">{{ session('success') }}</span>

        </div>
    @endif

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md h-[530px]">

        {{-- Header --}}
        <div class="text-center">
            <h2 class="text-xl font-bold text-blue-900 border-b-2 inline-block pb-1">
                Daftar Data Akun Pengguna
            </h2>
        </div>

        {{-- Card Container --}}
        <div class="p-6">
            <div class="max-h-[415px] overflow-y-auto">
                {{-- Table --}}
                <table class="w-full text-sm">
                    <thead class="sticky top-0 bg-white z-10">
                        <tr class="text-gray-600 border-b">
                            <th class="py-3">Username</th>
                            <th class="py-3">Email</th>
                            <th class="py-3">Tanggal dibuat</th>
                            <th class="py-3">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b hover:bg-gray-200 transition bg-white">

                                {{-- Username --}}
                                <td class="py-3 text-center">
                                    {{ $user->name }}
                                </td>

                                {{-- Email --}}
                                <td class="py-3 text-center">
                                    {{ $user->email }}
                                </td>

                                {{-- Tanggal --}}
                                <td class="py-3 text-center">
                                    {{ $user->created_at->format('d F Y') }}
                                </td>

                                {{-- Aksi --}}
                                <td class="py-3 text-center flex gap-2 justify-center">

                                    {{-- Edit --}}
                                    <a href="{{ route('users.edit', $user) }}"
                                        class="inline-flex items-center gap-1 bg-green-500 text-white px-3 py-1 rounded-lg hover:bg-gray-300">

                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4">
                                            <path
                                                d="M9.24264 18.9967H21V20.9967H3V16.754L12.8995 6.85453L17.1421 11.0972L9.24264 18.9967ZM14.3137 5.44032L16.435 3.319C16.8256 2.92848 17.4587 2.92848 17.8492 3.319L20.6777 6.14743C21.0682 6.53795 21.0682 7.17112 20.6777 7.56164L18.5563 9.68296L14.3137 5.44032Z">
                                            </path>
                                        </svg>
                                        Edit
                                    </a>

                                    {{-- Role per Client --}}
                                    <a href="{{ route('client-role.edit', $user) }}"
                                        class="inline-flex items-center gap-1 bg-blue-400 text-white px-3 py-1 rounded-lg hover:bg-blue-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-4 h-4">
                                            <path
                                                d="M14 21L12 23L10 21H4.99509C3.89323 21 3 20.1074 3 19.0049V4.99509C3 3.89323 3.89262 3 4.99509 3H19.0049C20.1068 3 21 3.89262 21 4.99509V19.0049C21 20.1068 20.1074 21 19.0049 21H14ZM19 19V5H5V19H10.8284L12 20.1716L13.1716 19H19ZM7.97216 18.1808C7.35347 17.9129 6.76719 17.5843 6.22083 17.2024C7.46773 15.2753 9.63602 14 12.1022 14C14.5015 14 16.6189 15.2071 17.8801 17.0472C17.3438 17.4436 16.7664 17.7877 16.1555 18.0718C15.2472 16.8166 13.77 16 12.1022 16C10.3865 16 8.87271 16.8641 7.97216 18.1808ZM12 13C10.067 13 8.5 11.433 8.5 9.5C8.5 7.567 10.067 6 12 6C13.933 6 15.5 7.567 15.5 9.5C15.5 11.433 13.933 13 12 13ZM12 11C12.8284 11 13.5 10.3284 13.5 9.5C13.5 8.67157 12.8284 8 12 8C11.1716 8 10.5 8.67157 10.5 9.5C10.5 10.3284 11.1716 11 12 11Z">
                                            </path>
                                        </svg>
                                        Role Client
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>

            {{-- Floating Add Button --}}
            <a href="{{ route('users.create') }}"
                class="fixed bottom-8 right-8 bg-blue-600 hover:bg-blue-700 text-white rounded-full p-4 shadow-lg"><svg
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path
                        d="M13.0001 10.9999L22.0002 10.9997L22.0002 12.9997L13.0001 12.9999L13.0001 21.9998L11.0001 21.9998L11.0001 12.9999L2.00004 13.0001L2 11.0001L11.0001 10.9999L11 2.00025L13 2.00024L13.0001 10.9999Z">
                    </path>
                </svg>
            </a>

        </div>

</x-admin-layout>
