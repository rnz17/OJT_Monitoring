<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-[#5C3C3C] antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-[#FAD4D4]">

    <div class="absolute top-0 left-0 p-4">
    <a href="{{ route('login') }}">
    <h2 class="text-xl font-bold">
        PORTALNEST
    </h2>
    </div>
</a>

        
    <div class="flex flex-col items-start w-[60%] h-full">
        <a href="/" class="mb-4 ml-[17%]"> <!-- Adjusted with left margin -->
        <x-application-logo class="w-20 h-20 fill-current text-[#5C3C3C]" />
        </a>
        <div class="w-full sm:max-w-md px-6 py-4 bg-white dark:bg-[#FAD4D4] shadow-2xl overflow-hidden sm:rounded-lg">
        {{ $slot }}
        </div>
    </div>



</div>



            </div>
        </div>
    </body>
</html>
