<x-admin-layout title="Kelola Akun">

    <x-notification-success />

    <div class="max-w-7xl mx-auto">

        <div class="rounded-lg p-2 mb-2">
            <div class="flex items-center justify-between gap-4">
                {{-- Search Bar --}}
                <div class="flex-1 max-w-md">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z"></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="searchInput"
                            placeholder="Cari Akun..."
                            class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 focus:border-transparent">

                        <div id="searchLoading" class="hidden absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg class="animate-spin h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Add Button --}}
                <a href="{{ route('users.create') }}"
                    class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path d="M11 11V7H13V11H17V13H13V17H11V13H7V11H11ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20Z"></path>
                    </svg>
                    Tambah Akun
                </a>
            </div>
        </div>

        {{-- Table Card --}}
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">

            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-bold text-blue-900">
                    Daftar Akun Pengguna
                </h2>
            </div>

            <div id="tableContainer">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    USERNAME
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    EMAIL
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    TANGGAL DIBUAT
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    AKSI
                                </th>
                            </tr>
                        </thead>

                        <tbody id="userTableBody" class="bg-white divide-y divide-gray-200">
                            @include('admin.users.partials.table-rows', ['users' => $users])
                        </tbody>

                    </table>
                </div>

                {{-- Footer/Pagination --}}
                @if($users->count() > 0)
                    <div class="px-6 py-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                @php
                                    $firstItem = ($users->currentPage() - 1) * $users->perPage() + 1;
                                    $lastItem = min($users->currentPage() * $users->perPage(), $users->total());
                                @endphp
                                Menampilkan {{ $firstItem }} sampai {{ $lastItem }} dari {{ $users->total() }} hasil
                            </div>

                            @if($users->hasPages())
                                <div class="flex items-center gap-3">
                                    {{-- Previous Button --}}
                                    @if($users->onFirstPage())
                                        <span class="border border-gray-200 px-3 py-2 text-sm text-gray-400 rounded-lg cursor-not-allowed">
                                            &lt; Sebelumnya
                                        </span>
                                    @else
                                        <a href="{{ $users->previousPageUrl() }}"
                                        class="border border-gray-200 px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg">
                                            &lt; Sebelumnya
                                        </a>
                                    @endif

                                    {{-- Next Button --}}
                                    @if($users->hasMorePages())
                                        <a href="{{ $users->nextPageUrl() }}"
                                        class="border border-gray-200 px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg">
                                            Selanjutnya &gt;
                                        </a>
                                    @else
                                        <span class="border border-gray-200 px-3 py-2 text-sm text-gray-400 rounded-lg cursor-not-allowed">
                                            Selanjutnya &gt;
                                        </span>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

<script>
    window.USERS_INDEX_URL = "{{ route('users.index') }}";
</script>

</x-admin-layout>
