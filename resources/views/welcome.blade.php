<x-app-layout>

    <div class="relative h-full w-full flex items-center justify-start text-left bg-cover bg-center p-8 md:p-12 lg:p-16 xl:p-24" style="background-image:url('{{ asset('/images/Hero.jpeg') }}');">

        <div class="absolute top-0 right-0 bottom-0 left-0 bg-gray-900 opacity-75"></div>

        <main class="z-10 ">

            <div class="text-left">

                <h1 class="text-xl md:text-5xl xl:text-6xl mb-4 font-extrabold text-orange-400">
                    {{config('app.motto')}}
                </h1>


                <h2 class="text-4xl tracking-tight leading-10 font-extrabold sm:text-5xl text-white sm:leading-none md:text-6xl">
                    {{config('app.name')}}
                </h2>

                <p class="my-3 text-white sm:mt-5 sm:max-w-xl md:mt-5 text-lg font-light">
                    {{config('app.synopsis')}}
                </p>

            </div>

            <div class="grid justify-center md:grid-cols-3 gap-4 md:w-1/2">

                @foreach (config('app.heroCards') as $motto)

                    <div class="max-w-sm bg-slate-300 opacity-50 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg" src="/images/{{ $motto['img'] }}" alt="" />
                        </a>

                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$motto['title']}}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$motto['content']}}</p>
                        </div>
                    </div>

                @endforeach

            </div>

        </main>

    </div>

</x-app-layout>
