@extends('layouts.app')

@section('title', 'Dashboard SSO')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12"
    style="background-image: url('{{ asset('images/BG Dashboard.png') }}'); background-size: cover; background-position: center;">

    <div class="relative z-10 w-full max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">

            <!-- Left Card -->
            <div class="lg:col-span-8 bg-white/30 rounded-2xl shadow-2xl p-12 lg:p-16 flex flex-col items-start justify-start min-h-[500px]">
                @include('dashboard.partials.simba-card')
            </div>

            <!-- Right Card -->
            <div class="lg:col-span-4 bg-blue-900/30 rounded-2xl shadow-2xl p-8 lg:p-10 flex flex-col items-center justify-between min-h-[500px]">
                @include('dashboard.partials.profile-card')
            </div>

        </div>
    </div>
</div>
@endsection
