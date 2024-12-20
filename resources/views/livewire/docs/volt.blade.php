<?php

use App\Models\User;
use App\Models\Document;

use Illuminate\Support\Collection;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

use Livewire\WithPagination; 
use Illuminate\Pagination\LengthAwarePaginator; 

use Illuminate\Database\Eloquent\Builder;

new class extends Component {
    use Toast;

    use WithPagination; 

    public string $search = '';

    public bool $drawer = false;

    public $doc_type = false;
    public $language = false;


    public array $sortBy = ['column' => 'title', 'direction' => 'asc'];


    // Clear filters
    public function clear(): void
    {
        $this->reset();
        $this->resetPage(); 
        $this->success('Filters cleared.', position: 'toast-bottom');

        $this->drawer = true;
    }

    // Delete action
    public function delete($id): void
    {
        $this->warning("Will delete #$id", 'It is fake.', position: 'toast-bottom');
    }

    // Reset pagination when any component property changes
    public function updated($property): void
    {
        if (! is_array($property) && $property != "") {
            $this->resetPage();
        }
    }





    // Table headers
    public function headers(): array
    {
        return [

            ['key' => 'document_no', 'label' => 'No','class' => 'bg-red-500/20 w-1'],
            ['key' => 'doc_no', 'label' => 'No','class' => 'font-large'],


            ['key' => 'title', 'label' => 'Document Title','class' => 'bg-green-300'],

            ['key' => 'user.full_name', 'label' => 'Author','class' => 'bg-green-300'],


            ['key' => 'doc_type', 'label' => 'Type'],
            ['key' => 'language', 'label' => 'Language'],
            ['key' => 'created_at', 'label' => 'Date', 'format' => ['date', 'd/m/Y']],
        ];
    }




















    public function records(): LengthAwarePaginator
    {
        return Document::query()
            ->when($this->search, fn(Builder $q) => $q->where('title', 'like', "%$this->search%"))
            ->when($this->doc_type, fn(Builder $q) => $q->where('doc_type', $this->doc_type)) 
            ->when($this->language, fn(Builder $q) => $q->where('language', $this->language)) 

            ->orderBy(...array_values($this->sortBy))
            ->paginate(20);



    }

















    public function with(): array
    {
        return [
            'docTypes' => config('conf_documents.docTypes'),
            'languages' => config('conf_documents.languages'),
            'records' => $this->records(),
            'headers' => $this->headers()
        ];
    }
}; ?>



<div class="relative h-screen w-full flex justify-center text-left">

<div class="w-full p-12 absolute top-0 bottom-0  bg-gray-50">



    <livewire:flash-message :msg="session('msg')" />

    {{-- <livewire:datatable-search :addBtnTitle="$conf['index']['addBtnTitle']" :addBtnRoute="$conf['formCreate']['route']"/> --}}


    <x-mary-header title="{{ config('conf_documents.index.title') }}" subtitle="{{ config('conf_documents.index.subtitle') }}">

        <x-slot:middle class="!justify-end">
            <x-mary-input icon="o-bolt" placeholder="Search..." />
        </x-slot:middle>

        <x-slot:actions>
            <x-mary-button icon="o-funnel" wire:click="$toggle('drawer')"/>
            <x-mary-button icon="o-plus" class="btn-primary" />
        </x-slot:actions>

    </x-mary-header>


<x-mary-card  shadow >


    <x-mary-table :headers="$headers" :rows="$records" :sort-by="$sortBy" striped @row-click="alert($event.detail.name)" link="users/{id}/edit" with-pagination />

    </x-mary-card>


    <x-mary-drawer wire:model="drawer" title="Filters" right separator with-close-button ... >

        <div class="grid gap-5"> 
            <x-mary-input placeholder="Search..." wire:model.live="search" />
            <x-mary-select placeholder="Select Doc Type" wire:model.live="doc_type" :options="$docTypes" icon="o-flag"  /> 
            <x-mary-select placeholder="Select Language" wire:model.live="language" :options="$languages" icon="o-flag"  /> 

            <x-mary-button wire:click="clear" label="Clear Filters" icon-right="o-x-circle" />

        </div>

    </x-mary-drawer>


    <livewire:flash-message :msg="['type' => 'warning', 'text' => config('conf_documents.index.noItemText')]">


</div>

</div>