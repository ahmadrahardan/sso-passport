@component('mail::layout')
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            RSD Balung
        @endcomponent
    @endslot

    {{ Illuminate\Mail\Markdown::parse($slot) }}

    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} RSD Balung. Hak Cipta Dilindungi Undang-Undang.
        @endcomponent
    @endslot
@endcomponent
