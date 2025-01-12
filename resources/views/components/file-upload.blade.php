@props(['is_multiple'])
@props(['name'])
@props(['files'])


<div class="flex bg-white py-3">

    <div class="flex w-1/3 bg-teal-100">
        <input
            wire:model="files"
            name="{{$name}}"
            id="uploadInput"
            type="file"
            class="w-full text-gray-500 font-medium text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded"
            {{ $is_multiple ? 'multiple' : '' }}
        />
    </div>

    <div class="flex flex-col flex-grow w-2/3 pl-6" id="files_div">

        @foreach ($files as $file)


            <div  wire:key="fff{{$loop->index}}">

                <x-mary-button
                    icon="c-x-mark"
                    wire:click="removeFile('{{ $file->getClientOriginalName() }}')"
                    class="btn-square bg-red-500 px-1 py-1 text-lg text-white"/>

                <span class="text-gray-500 font-medium text-sm ml-4">
                    {{ $file->getClientOriginalName() }}
                </span>

            </div>

        @endforeach

    </div>


    @error('files') <span class="error">{{ $message }}</span> @enderror

</div>


<script>

    document.getElementById("uploadInput").onchange = ()=>{
        let files = document.getElementById("uploadInput").files;


        console.log(files)
    }

</script>

