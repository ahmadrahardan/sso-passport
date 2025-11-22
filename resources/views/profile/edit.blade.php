<x-admin-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    <div class="py-4 px-8">
        <div class="">
            @include('profile.partials.update-profile-information-form')
        </div>
        {{-- <div class="max-w-7xl mx-auto rounded-lg space-y-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="grid sm:grid-2 gap-6">
                    <div class="p-4 sm:p-8 bg-gray-100 shadow sm:rounded-lg hover:bg-gray-200 transition duration-200">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                    <div class="p-4 sm:p-8 bg-gray-100 shadow sm:rounded-lg hover:bg-gray-200 transition duration-200">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-gray-100 shadow sm:rounded-lg hover:bg-gray-200 transition duration-200">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class=" bg-gray-100 shadow transition duration-200">
                @include('profile.partials.update-profile-information-form')
            </div>

            <!-- Delete Account Card -->
        </div> --}}
    </div>
</x-admin-layout>
