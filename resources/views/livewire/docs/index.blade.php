


<?php

use App\Models\User;
use App\Models\Document;

use Illuminate\Support\Collection;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

use Livewire\WithPagination; 
use Illuminate\Pagination\LengthAwarePaginator; 


new class extends Component {

    use Toast;
    use WithPagination; 

    public string $search = '';
    public bool $drawer = false;
    public array $sortBy = ['column' => 'title', 'direction' => 'asc'];

    // Clear filters
    public function clear(): void
    {
        $this->reset();
        $this->success('Filters cleared.', position: 'toast-bottom');
    }

    // Delete action
    public function delete($id): void
    {
        $this->warning("Will delete #$id", 'It is fake.', position: 'toast-bottom');
    }

    // Table headers
    public function headers(): array
    {
        return [
            ['key' => 'id', 'label' => '#', 'class' => 'w-1'],
            ['key' => 'name', 'label' => 'Name', 'class' => 'w-64'],
            ['key' => 'age', 'label' => 'Age', 'class' => 'w-20'],
            ['key' => 'email', 'label' => 'E-mail', 'sortable' => false],
            ['key' => 'company.name', 'label' => 'Company'], 
        ];
    }

    /**
     * For demo purpose, this is a static collection.
     *
     * On real projects you do it with Eloquent collections.
     * Please, refer to maryUI docs to see the eloquent examples.
     */
    public function documents(): LengthAwarePaginator
    {
        return Document::query()
            ->when($this->search, fn(Builder $q) => $q->where('title', 'like', "%$this->search%"))
            ->orderBy(...array_values($this->sortBy))
            ->paginate(5); // No more `->get()`  
    }


    public function with(): array
    {
        return [
            'documents' => $this->documents(),
            'headers' => $this->headers()
        ];
    }
}; ?>






















<x-app-layout>

    <div class="relative h-screen w-full flex items-center justify-center text-left">
    <div class="w-full p-12 absolute top-0 bottom-0  bg-gray-50">

    <x-mary-header title="Products" subtitle="List of Products"  />


    {{-- Left --}}
    <x-mary-drawer wire:model="drawer" class="w-11/12 lg:w-1/3">
        <div>...</div>
        <x-mary-button label="Close" @click="$wire.showDrawer1 = false" />
    </x-mary-drawer>



    </div>
    </div>


</x-app-layout>
