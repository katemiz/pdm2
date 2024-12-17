<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<footer class="py-16 text-center bg-yellow-300 text-sm text-black dark:text-white/70">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})


    <div class="">
        <img src="{{ asset('/images/baykus_orange.svg') }}" width="28" alt="Company Icon" class="mx-auto sm:mx-0 my-2">
    </div>


</footer>