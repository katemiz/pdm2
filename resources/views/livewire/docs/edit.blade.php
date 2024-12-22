<?php

use Livewire\Volt\Component;

use App\Models\User;
use App\Models\Document;
use App\Models\Company;

use Illuminate\Support\Collection;

use App\Livewire\Forms\DocumentForm;

use Livewire\WithFileUploads;


new class extends Component {


    use WithFileUploads;

    public DocumentForm $form;


    public $did;

    public $title;
    public $notes;
    public $company_id;
    public $doc_type;
    public $language;



    public function getCompanies() {

        $c = Company::all()->pluck('name', 'id');

        foreach($c as $id => $name) {
            $dizin[] = ['id' => $id, 'name' => $name];
        }

        return $dizin;
    }


    public function setProperties() {

        $this->did = request('id');

        $doc = Document::find($this->did);

        $this->company_id = $doc->company_id;
        $this->doc_type = $doc->doc_type;
        $this->language = $doc->language;
        $this->notes = $doc->remarks;
        $this->title = $doc->title;

    }




    public function update() {

        $this->did = request('id');

        $doc = Document::find($this->did);

        $this->company_id = $doc->company_id;
        $this->doc_type = $doc->doc_type;
        $this->language = $doc->language;
        $this->notes = $doc->remarks;
        $this->title = $doc->title;

    }






    public function with(): array
    {
        // $this->setProperties();

        $this->form->setDocument(request('id'));

        return [
            'docTypes' => config('conf_documents.docTypes'),
            'languages' => config('conf_documents.languages'),
            'companies' => $this->getCompanies(),

        ];
    }




}; ?>

<div class="relative h-screen w-full flex justify-center text-left bg-gray-200">

    <div class="w-full p-12 absolute top-0 bottom-0  ">

        <x-mary-header title="{{ config('conf_documents.formEdit.title') }}" subtitle="{{ config('conf_documents.formEdit.subtitle') }}" />

        <x-mary-card  shadow >

            <x-mary-form wire:submit="update">

                <livewire:radio
                    label="Select Company"
                    name="company_id"
                    :options="$companies"
                    :selected="$this->form->company_id"
                    wire:model="company_id" />

                <livewire:radio
                    label="Select Document Type"
                    name="doc_type"
                    :options="$docTypes"
                    :selected="$this->form->doc_type"
                    wire:model="doc_type" />

                <livewire:radio
                    label="Select Document Language"
                    name="language"
                    :options="$languages"
                    :selected="$this->form->language"
                    wire:model="language" />

                <x-mary-input label="Document Title" wire:model="form.title" />
                <livewire:quill wire:model="form.synopsis" label="Document Synopsis" name="synopsis"  :value="$this->form->synopsis" />
                <x-mary-file wire:model="file" label="Files" hint="Only PDF" accept="application/pdf" multiple/>

                <x-slot:actions>
                    <x-mary-button label="Cancel" />
                    <x-mary-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
                </x-slot:actions>
            </x-form>

        </x-mary-card>

    </div>

</div>
