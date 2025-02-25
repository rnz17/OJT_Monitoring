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
    <div class="min-h-screen flex flex-col items-center justify-center pt-6 sm:pt-4 px-4 bg-gray-100 dark:bg-[#FAD4D4] overflow-hidden">
        @if (request()->is('/'))
        <div class="flex justify-end">
            <img src="{{ asset('images/logincolor.jpg') }}" alt="Login Image" class="z-10 absolute right-0 top-1/2 transform -translate-y-1/2 w-1/3 h-full">
        </div>
        @elseif (request()->is('register'))
        <div class="flex justify-end h-full">
            <img src="{{ asset('images/registercolor.jpg') }}" alt="Login Image" class="absolute right-0 top-[50%] transform -translate-y-1/2 w-1/3 h-full">
        </div>
        @endif
    <div class="absolute top-0 left-0 p-4">
    <a href="{{ route('login') }}">
    <h2 class="text-xl font-bold">
        PORTALNEST
    </h2>
    </div>
</a>

        
<div class="flex flex-col items-start w-[75%] h-full lg:w-3/4 md:w-4/5 sm:w-full pr-20">
    <a href="/" class="mb-4 ml-[35%] sm:ml-40"> 
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
