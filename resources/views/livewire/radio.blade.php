<?php

use Livewire\Volt\Component;

use App\Models\User;
use App\Models\Document;

use Illuminate\Support\Collection;



new class extends Component {


    public $label;
    public $name;
    public $options;
    public $selected;






    // public function with(): array
    // {
    //     return [
    //         'qid' => 'q'.rand(0, 1000),
    //         'deneme' => 'deneme',
    //     ];
    // }
}; ?>











<div class="flex flex-col my-4">


    <h3 class="font-semibold text-gray-900 text-md mb-2">{{ $label }}</h3>

    <div class="flex flex-col md:flex-row gap-4">
        @foreach ($options as $option)


            <div class="">
                <input
                    type="radio"
                    id="{{ $name . '_' . $option['id'] }}"
                    name="{{ $name }}"
                    value="{{ $option['id'] }}"
                    {{ $selected == $option['id'] ? 'checked' : '' }}
                    class="form-check-input">

                <label for="{{ $name . '_' . $option['id'] }}" class="text-base ml-0.5">
                    {{ $option['name'] }}
                </label>
            </div>
        @endforeach
    </div>

    <div class="text-red-600 my-1 font-bold">
        @error($name)
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
</div>
