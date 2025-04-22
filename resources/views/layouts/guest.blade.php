<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>GMI Yogyakarta</title>

        <!-- Favicons -->
        <link href="{{ asset('assets/img/gmi.png')}}" rel="icon">
        <link href="{{ asset('assets/img/gmi.png')}}" rel="apple-touch-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="text-center">
                <a href="/">
                    <img src="{{ asset('assets/img/gmi.png') }}" alt="Logo" class="w-20 h-20 mx-auto" />
                </a>
                <p class="mt-2 text-2xl font-semibold text-gray-700">Gereja Methodist Indonesia Yogyakarta</p>
            </div>            

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
