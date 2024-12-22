<?php

use Livewire\Volt\Component;

use App\Models\User;
use App\Models\Document;

use Illuminate\Support\Collection;



new class extends Component {


    const EVENT_VALUE_UPDATED = 'quill_value_updated';

    public $value;
    public $label;
    public $name;

    public function updatedValue($value) {
        $this->dispatch(self::EVENT_VALUE_UPDATED, $this->value);
    }








    // Reset pagination when any component property changes
    public function updated($property): void
    {
        if (! is_array($property) && $property != "") {
            $this->resetPage();
        }
    }




    public function with(): array
    {
        return [
            'qid' => 'q'.rand(0, 1000),
            'deneme' => 'deneme',
        ];
    }
}; ?>











<div class="mt-4">

    <div class="flex flex-col gap-2" wire:ignore>

        <h3 class="mb-1 font-semibold text-gray-900 text-md">{{ $label }}</h3>

        <!-- Create the editor container -->
        <div id="{{ $qid }}">{!! $value !!}</div>

        <!-- Initialize Quill editor -->







        <script>
            const quill{{ $qid }} = new Quill('#{{ $qid }}', {
                theme: 'snow'
            });

            quill{{ $qid }}.on('text-change', function() {
                let parent = document.getElementById('{{ $qid }}')
                @this.set('{{ $name }}', parent.getElementsByClassName('ql-editor')[0].innerHTML)
            })
        </script>





    </div>

    <div class="text-red-600 my-1 font-bold">
        @error('form.' . $name)
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

</div>
