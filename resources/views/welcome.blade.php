<x-app-layout>




    <div class="relative h-screen w-full flex items-center justify-start text-left bg-cover bg-center" style="background-image:url('{{ asset('/images/Hero.jpeg') }}');">
    <div class="absolute top-0 right-0 bottom-0 left-0 bg-gray-900 opacity-75"></div>
    
    <main class="px-10 lg:px-24 z-10">
            <div class="text-left">

            <h1 class="text-xl md:text-5xl xl:text-6xl mb-4 font-extrabold text-orange-400">

                {{config('app.motto')}}
            </h1>


            <h2 class="text-4xl tracking-tight leading-10 font-extrabold sm:text-5xl text-white sm:leading-none md:text-6xl">
                {{config('app.name')}}
                
            </h2>
            <p class="mt-3 text-white sm:mt-5 sm:max-w-xl md:mt-5 text-lg font-light">
                {{config('app.synopsis')}}
            </p>
            <div class="mt-5 sm:mt-8 sm:flex justify-start">


            </div>
            </div>


                <div class="grid md:grid-cols-3 gap-4 md:w-1/2">

                    @foreach (config('app.heroCards') as $motto)

                        <x-mary-card title="{{$motto['title']}}">
                            
                            <x-slot:figure>
                                <img src="{{ asset("/images/".$motto['img']) }}" />
                            </x-slot:figure>

                            {{$motto['content']}}

                        </x-mary-card>

                    @endforeach

                </div>


        </main>
    
    </div>









</x-app-layout>
















