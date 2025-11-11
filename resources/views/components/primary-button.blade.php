<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'w-full bg-blue-600 text-white py-3 rounded-lg font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 ease-in-out'
    ]) }}>
    {{ $slot }}
</button>
