<form wire:submit="save">
    <input type="file" id="fupload" wire:model="photos" multiple>

    @error('photos.*') <span class="error">{{ $message }}</span> @enderror

    <button type="submit">Save photo</button>





    <script>



        let el = document.getElementById("fupload");

        el.onchange = ()=>{

            console.log(el.files.length + " files selected");

        }




    </script>





</form>
