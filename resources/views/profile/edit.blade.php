<x-admin-layout>
    <div class="py-4 px-8 relative">
        @if (session('status') === 'profile-updated')
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
                class="absolute top-1 right-6 bg-emerald-500 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 z-50">
                <span class="font-medium">Anda berhasil mengedit profile</span>
            </div>
        @endif
        <div class="">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>
</x-admin-layout>
