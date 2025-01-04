<?php

use Livewire\Volt\Component;
use Illuminate\Support\Collection;

use Livewire\WithFileUploads;


new class extends Component {

    use WithFileUploads;

    public $value;
    public $label;
    public $name;

    public $files =[];

    public function removeFile($fileToRemove) {

        foreach ($this->files as $key => $dosya) {
            if ($dosya->getClientOriginalName() == $fileToRemove) {
                unset($this->files[$key]);
            }
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











<div class="flex flex-col mt-4 items-start bg-green-400"  wire:ignore>

    <h3 class="mb-1 font-semibold text-gray-900 text-md">{{ $label }} {{ $qid }}</h3>


    <div class="flex flex-col w-full lg:flex-row gap-2 p-2">


        <div class="flex w-1/3 bg-yellow-300">


            <input type="file" id="{{ $qid }}" multiple>
        </div>



        <div class="flex flex-col flex-grow w-2/3 pl-6 bg-slate-400" id="files_div">

            No files selected

        </div>

    </div>

    <div class="text-red-600 my-1 font-bold">
        @error('form.' . $name)
            <span class="error">{{ $message }}</span>
        @enderror
    </div>




</div>

<script>


    document.getElementById('{{ $qid }}').onchange = ()=>{

        let d =document.getElementById('{{ $qid }}').files;
        let p =document.getElementById('files_div');

        const files = d;

        for (let i = 0; i < files.length; i++) {

            console.log(files[i].name);

            let id = 'Id'+i;

            let d1 = document.createElement('div');
            d1.classList.add('flex','m-1');
            d1.id = id;

            let d2 = document.createElement('div');
            d2.classList.add('flex','items-center','bg-red-400','px-1','py-1');

            let a = document.createElement('a');

            a.innerHTML = files[i].name;

            a.addEventListener("click", function(){
                document.getElementById(id).remove();
            });

            d2.appendChild(a);
            d1.appendChild(d2);
            p.appendChild(d1);
        }
    }

</script>
