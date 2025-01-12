<div class="mx-auto p-4 bg-gray-200">

    <div class="w-full p-12  top-0 bottom-0  ">



        @if ($this->form->docNo)

            <x-mary-header
                :title="$this->form->docNo"
                :subtitle="config('conf_documents.formEdit.subtitle')"
            />

        @else

            <x-mary-header
                :title="config('conf_documents.formCreate.title')"
                :subtitle="config('conf_documents.formCreate.subtitle')"
            />

        @endif





        <x-mary-card  shadow >

            <x-mary-form
                wire:submit="{{ $this->form->docNo ? 'update':'save' }}">

                <livewire:radio
                    label="Select Company"
                    name="company_id"
                    :options="$this->form->companies"
                    :selected="$this->form->company_id"
                    wire:model="company_id" />

                <livewire:radio
                    label="Select Document Type"
                    name="doc_type"
                    :options="config('conf_documents.docTypes')"
                    :selected="$this->form->doc_type"
                    wire:model="doc_type" />

                <livewire:radio
                    label="Select Document Language"
                    name="language"
                    :options="config('conf_documents.languages')"
                    :selected="$this->form->language"
                    wire:model="language" />

                <x-mary-input label="Document Title" wire:model="form.title"/>

                <livewire:quill
                    wire:model="form.synopsis"
                    label="Document Synopsis"
                    name="synopsis"
                    :value="$this->form->synopsis"
                />


                @if ($this->form->docNo)
                <livewire:file-list
                    :model="$this->form->document"
                    collection="Doc"
                    label="Files"
                    is_editable="true"
                />
                @endif

                {{-- <x-file-upload
                    :files="$files"
                    name="files"
                    is_multiple="true"
                /> --}}


                @livewire('lw-upload', [
                    'model' => 'Document',
                    'modelId' => $this->form->rid ? $this->form->rid: false,
                    'isMultiple'=> true,                   // can multiple files be selected
                    'tag' => 'document'                         // Any tag other than model name
                ])

                <x-slot:actions>
                    <x-mary-button wire:click='backToView({{ $this->form->rid }})' label="Cancel" />
                    <x-mary-button
                        label="{{ $this->form->docNo ? config('conf_documents.formEdit.buttonTitle') : config('conf_documents.formCreate.buttonTitle') }}"
                        class="btn-primary"
                        type="submit"
                        spinner="save"
                    />
                </x-slot:actions>

            </x-form>

        </x-mary-card>

    </div>

</div>
