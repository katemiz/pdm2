@props(['is_multiple'])
{{-- @props(['name']) --}}
@props(['files'])
@props(['varName'])



<div class="flex bg-white py-3 items-start">

    <div class="flex w-1/3">
        <input
            wire:model="files"
            name="{{ $varName }}"
            id="{{ $varName }}Id"
            type="file"
            class="w-full text-gray-500 font-medium text-sm bg-gray-100 file:cursor-pointer cursor-pointer file:border-0 file:py-2 file:px-4 file:mr-4 file:bg-gray-800 file:hover:bg-gray-700 file:text-white rounded"
            {{ $is_multiple ? 'multiple' : '' }}
        />
    </div>

    <div class="flex flex-col flex-grow w-2/3 pl-6 bg-yellow-300" id="files_div">

       @if (count($files) > 0)

           @foreach ( $files as $file)

               <div class="flex m-1">

                   <div class="flex bg-red-400 px-1 py-1 items-center">
                       <a wire:click="removeFile('{{$file->getClientOriginalName()}}')">
                           <x-mary-icon name="c-x-mark" class="w-6 h-6 text-white" />
                       </a>
                   </div>

                   <div class="w-full  px-2 py-1">{{$file->getClientOriginalName()}}</div>
               </div>

           @endforeach

       @endif

    </div>


    {{-- @error('files') <span class="error">{{ $message }}</span> @enderror --}}

</div>


<script>


    console.log("{{ $varName }}Id");

    let el{{ $varName }} = document.getElementById("{{ $varName }}Id");

    el{{ $varName }}.onchange = ()=>{
        let files = el{{ $varName }}.files;

        console.log(files.length + " files selected");

    }

    // document.getElementById("{{ $varName }}Id").onchange = ()=>{
    //     let files = document.getElementById("document.getElementById('{{ $varName }}Id')").files;

    //     console.log(files.files.length + " files selected");

    //     // $('#numberOfFiles').text(this.files.length + " files selectedddd");
    // }





    // window.addEventListener('updateNoOfFiles',function(e) {


    //     // console.log(e.detail.name);

    //     el.files.length = el.files.length-1;

    //     for (var i = 0; i < el.files.length; i++)
    //     {
    //         // console.log(el.files[i].name);

    //         if (el.files[i].name == e.detail.name) {
    //             console.log("removing file");
    //             el.files.delete(i);
    //         }
    //     }









    //     // alert("updateNoOfFiles");
    //     el.files.length = el.files.length-1;

    //     console.log(el.files.length + " files selected.NEW");
    // })



</script>

