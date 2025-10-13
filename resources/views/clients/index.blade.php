<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage OAuth Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-end mb-4">
                        <a href="{{ route('clients.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Create New Client
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('new_client_id') && session('new_client_secret'))
                    <div class="mb-6 p-4 bg-blue-100 border-l-4 border-blue-500 text-blue-700">
                        <h3 class="font-bold">Client Created Successfully!</h3>
                        <p class="text-sm">Berikut adalah Client ID dan Client Secret Anda. **Harap simpan Client Secret ini di tempat yang aman. Anda tidak akan bisa melihatnya lagi.**</p>
                        <div class="mt-3 p-3 bg-gray-50 rounded-md">
                            <div class="mb-2">
                                <label class="block font-medium text-sm text-gray-700">Client ID</label>
                                <input type="text" readonly value="{{ session('new_client_id') }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700">Client Secret</label>
                                <input type="text" readonly value="{{ session('new_client_secret') }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Client Name</th>
                                    <th scope="col" class="px-6 py-3">Client ID</th>
                                    <th scope="col" class="px-6 py-3">Redirect URL</th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clients as $client)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $client->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $client->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $client->redirect_uris[0] ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 text-right flex gap-2 justify-end">
                                        <a href="{{ route('clients.edit', $client->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus client ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                        Belum ada client yang dibuat.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
