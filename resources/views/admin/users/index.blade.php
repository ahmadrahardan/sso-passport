<x-admin-layout title="Kelola Akun">

    <div class="max-w-6xl mx-auto bg-slate-50 p-6 rounded-xl shadow-md">

        {{-- Header --}}
        <div class="text-center mb-6">
            <h2 class="text-xl font-bold text-blue-900 border-b-2 inline-block pb-1">
                Daftar Data Akun Pengguna
            </h2>
        </div>

        {{-- Card Container --}}
        <div class="p-6 rounded-xl ">

            {{-- Table --}}
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-gray-600 border-b">
                        <th class="py-3">Username</th>
                        <th class="py-3">Email</th>
                        <th class="py-3">Tanggal dibuat</th>
                        <th class="py-3">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b hover:bg-gray-200 transition bg-white rounded-xl">

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
                                    class="inline-flex items-center gap-1 bg-gray-200 px-3 py-1 rounded-lg hover:bg-gray-300">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                {{-- Role per Client --}}
                                <a href="{{ route('client-role.edit', $user) }}"
                                    class="inline-flex items-center gap-1 bg-blue-200 px-3 py-1 rounded-lg hover:bg-blue-300">
                                    <i class="fa fa-key"></i> Role Client
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        {{-- Floating Add Button --}}
        <a href="{{ route('users.create') }}"
            class="fixed bottom-8 right-8 bg-blue-600 hover:bg-blue-700 text-white rounded-full p-4 shadow-lg">+
            <i class="fa fa-plus text-xl"></i>
        </a>

    </div>

</x-admin-layout>
