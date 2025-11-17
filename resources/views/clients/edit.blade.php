<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit OAuth Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('clients.update', $client->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Client Name</label>
                            <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" name="name" value="{{ old('name', $client->name) }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="redirect" class="block font-medium text-sm text-gray-700">Redirect URL</label>
                            <input id="redirect" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="url" name="redirect" value="{{ old('redirect', $client->redirect_uris[0] ?? '')}}" required />
                            <p class="mt-2 text-sm text-gray-500">URL lengkap callback aplikasi Anda.</p>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('clients.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Update Client
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
