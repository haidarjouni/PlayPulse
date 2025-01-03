<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>
        <!-- font awsome-->
        <script src="https://kit.fontawesome.com/e66d544c68.js" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <!-- flowbite-->
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
        <!-- pikaday-->
        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
        <script src="{{ asset('js/alpine-modal.js') }}" defer></script>
{{--        tom select--}}
        <script src="tom-select.complete.js"></script>
        <link href="tom-select.bootstrap4.css" rel="stylesheet" />
{{--        jqeury--}}
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
        @livewireStyles
        <style>
            @import url(https://fonts.bunny.net/css?family=abeezee:400|aldrich:400);
        /*    font-family: 'Aldrich', sans-serif;*/
        /*    font-family: 'ABeeZee', sans-serif;*/
            [x-cloak] { display: none !important; }

        </style>
    </head>
    <body {{ $attributes->merge(['class' => 'font-sans antialiased min-h-screen body']) }} {{ $alpine ?? '' }}> <!-- this is used to pass more attribute for alpine-->
        <x-header></x-header>
        <main>
            {{ $slot }}
        </main>
        @stack('scripts')
        @livewireScripts

    </body>
</html>
