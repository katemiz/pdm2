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

    <body class="font-sans antialiased">

        <livewire:layout.navigation />




    {{-- <body style="background-image: url('{{ asset('/images/HeroPage1.png') }}');" class="bg-cover bg-center bg-no-repeat"> --}}







        {{-- <section class="min-h-screen bg-gray-300"> --}}

            {{-- <div class="grid max-w-screen-2xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 bg-cyan-200"> --}}
            {{-- <div class="grid max-w-screen-2xl mx-auto bg-cyan-200"> --}}



                {{ $slot }}

            {{-- </div>

        </section> --}}

        <livewire:layout.footer />

    </body>
</html>
