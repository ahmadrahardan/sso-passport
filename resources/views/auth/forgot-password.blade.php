@extends('layouts.auth')

@section('title', 'Lupa Password')

@section('content')
<div class="w-full max-w-6xl">
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row h-auto md:h-[600px]">
        <!-- Left Section - Forgot Password Form -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex items-center">
            <div class="w-full">
                @include('auth.partials.forgot-password-form')
            </div>
        </div>

        <!-- Right Section - Office Image -->
        <div class="hidden md:block md:w-1/2 relative">
            @include('auth.partials.hero-image')
        </div>
    </div>
</div>
@endsection
