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

    public $author_id = false;
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
            ['key' => 'doc_no', 'label' => 'No','class' => ''],
            ['key' => 'title', 'label' => 'Document Title','class' => ''],
            ['key' => 'user.full_name', 'label' => 'Author','class' => ''],
            ['key' => 'type_name', 'label' => 'Type Name'],
            ['key' => 'language', 'label' => 'Language'],
            ['key' => 'created_at', 'label' => 'Date', 'format' => ['date', 'd/m/Y']],
            ['key' => 'actions', 'label' => 'Actions','class' => ''],

        ];
    }

    // Records
    public function records(): LengthAwarePaginator
    {
        return Document::query()
            ->when($this->search, fn(Builder $q) => $q->where('title', 'like', "%$this->search%"))
            ->when($this->doc_type, fn(Builder $q) => $q->where('doc_type', $this->doc_type))
            ->when($this->language, fn(Builder $q) => $q->where('language', $this->language))
            ->when($this->author_id, fn(Builder $q) => $q->where('user_id', $this->author_id))

            ->orderBy(...array_values($this->sortBy))
            ->paginate(8);
    }


    public function with(): array
    {
        $authors = [];

        $list = Document::distinct('user_id')->pluck('user_id')->toArray();

        foreach ( $list as $aid ) {

            $u = User::find($aid);
            array_push($authors,['id'=> $u->id,'name' =>$u->name.' '.$u->lastname]);
        };

        return [
            'authors' => $authors,
            'docTypes' => config('conf_documents.docTypes'),
            'languages' => config('conf_documents.languages'),
            'records' => $this->records(),
            'headers' => $this->headers()
        ];
    }
}; ?>



<div class="relative h-screen w-full flex justify-center text-left bg-gray-200">

<div class="w-full p-12 absolute top-0 bottom-0  ">

    <livewire:flash-message :msg="session('msg')" />

    <x-mary-header title="{{ config('conf_documents.index.title') }}" subtitle="{{ config('conf_documents.index.subtitle') }}">

        <x-slot:middle class="!justify-end">
            <x-mary-input icon="o-magnifying-glass" placeholder="Search..." wire:model.live="search" clearable/>
        </x-slot:middle>

        <x-slot:actions>
            <x-mary-button icon="o-funnel" wire:click="$toggle('drawer')"/>
            <x-mary-button icon="o-plus" class="btn-primary" />
        </x-slot:actions>

    </x-mary-header>


    <x-mary-card  shadow >

        <x-mary-table
            :headers="$headers"
            :rows="$records"
            :sort-by="$sortBy"
            with-pagination   >

            {{-- Special `actions` slot --}}
            @scope('header_actions', $header)
            Actions
            @endscope

            @scope('cell_doc_no', $record)
            <a href="/docs/{{  $record->id}}" class="text-blue-600 ">{{ $record->doc_no }}</a>
            @endscope


            {{-- Special `actions` slot --}}
            @scope('cell_actions', $record)
                <x-mary-button icon="o-eye" wire:click="delete({{ $record->id }})" spinner class="btn-sm btn-circle text-blue-500" />
                <a href="/docs/{{ $record->id }}/edit" class="btn-sm btn-circle text-blue-500" />
                    <x-mary-icon name="o-pencil" class="w-8 h-8  text-blue-500 p-2 rounded-full" />
                </a>
            @endscope

        </x-mary-table>

    </x-mary-card>


    <x-mary-drawer wire:model="drawer" title="Filters" right separator with-close-button ... >

        <div class="grid gap-5">
            <x-mary-input placeholder="Search..." wire:model.live="search" />

            <x-mary-select placeholder="Select Author" wire:model.live="author_id" :options="$authors" icon="o-user"  />

            <x-mary-select placeholder="Select Doc Type" wire:model.live="doc_type" :options="$docTypes" icon="o-document"  />
            <x-mary-select placeholder="Select Language" wire:model.live="language" :options="$languages" icon="o-language"  />

            <x-mary-button wire:click="clear" label="Clear Filters" icon-right="o-x-circle" />

        </div>

    </x-mary-drawer>


    <livewire:flash-message :msg="['type' => 'warning', 'text' => config('conf_documents.index.noItemText')]">


</div>

</div>
