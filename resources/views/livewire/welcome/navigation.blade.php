{{-- <nav class="-mx-3 flex flex-1 justify-end">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Log in
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Register
            </a>
        @endif
    @endauth
</nav> --}}







<div class="bg-gray-400 p-4">

    <x-mary-nav sticky full-width>

        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-mary-icon name="o-bars-4" class="cursor-pointer" />
            </label>

            {{-- Brand --}}
            <div class="flex flex-row items-center">

                <div class="">
                    <img src="{{ asset('/images/baykus_orange.svg') }}" width="28" alt="Company Icon" class="mx-auto sm:mx-0 my-2">
                </div>

                <div class="ml-4 font-hg font-extrabold">PDM</div>
            </div>
        </x-slot:brand>

        {{-- Right side actions --}}
        <x-slot:actions>
            <x-mary-button label="Login" icon="s-user-circle" link="login" class="btn-ghost btn-sm" responsive />
            {{-- <x-mary-button label="Sign Up" icon="o-bell" link="###" class="btn-ghost btn-sm" responsive /> --}}
        </x-slot:actions>
    </x-mary-nav>

</div>
