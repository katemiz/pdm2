<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="antialiased font-sans">

        @if (Route::has('login'))
        <livewire:welcome.navigation />
        @endif

        {{-- <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50"> --}}







            <section class="bg-cyan-50 text-black/50 dark:bg-gray-900 relative min-h-screen">
                <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                    <div class="mr-auto place-self-center lg:col-span-7">

                        <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                            {{config('app.motto')}}
                        </h1>



                        <x-mary-header title="{{config('app.code')}}" subtitle="{{config('app.name')}}"  />



                        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                            {{config('app.synopsis')}}
                        </p>




                        <div class="flex flex-col md:flex-row w-full mx-auto gap-4">

                            @foreach (config('app.heroCards') as $motto)

                                <x-mary-card title="{{$motto['title']}}">
                                    
                                    <x-slot:figure>
                                        <img src="{{ asset("/images/".$motto['img']) }}" />
                                    </x-slot:figure>

                                    {{$motto['content']}}

                                </x-mary-card>

                            @endforeach

                        </div>



                    </div>






                    <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                        <img src="{{ asset("/images/Hero.svg") }}" alt="mockup">
                    </div>
                </div>
            </section>






            <footer class="py-16 text-center bg-yellow-300 text-sm text-black dark:text-white/70">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>

        {{-- </div> --}}
    </body>
</html>
