<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">
            <!-- Profile Information Card -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="grid sm:grid-2 gap-6">
                    <div class="p-4 sm:p-8 bg-gray-100 shadow sm:rounded-lg hover:bg-gray-200 transition duration-200">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                    <div class="p-4 sm:p-8 bg-gray-100 shadow sm:rounded-lg hover:bg-gray-200 transition duration-200">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

                <!-- Update Password Card -->
                <div class="p-4 sm:p-8 bg-gray-100 shadow sm:rounded-lg hover:bg-gray-200 transition duration-200">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Card -->
        </div>
    </div>
</x-admin-layout>
