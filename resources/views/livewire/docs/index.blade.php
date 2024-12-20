
<div class="relative h-screen w-full flex justify-center text-left">

<div class="w-full p-12 absolute top-0 bottom-0  bg-gray-50">



    <livewire:flash-message :msg="session('msg')" />

    {{-- <livewire:datatable-search :addBtnTitle="$conf['index']['addBtnTitle']" :addBtnRoute="$conf['formCreate']['route']"/> --}}


    <x-mary-header title="{{ $conf['index']['title'] }}" subtitle="{{ $conf['index']['subtitle'] }}">

        <x-slot:middle class="!justify-end">
            <x-mary-input icon="o-bolt" placeholder="Search..." />
        </x-slot:middle>

        <x-slot:actions>
            <x-mary-button icon="o-funnel" wire:click="$toggle('showDrawer')"/>
            <x-mary-button icon="o-plus" class="btn-primary" />
        </x-slot:actions>

    </x-mary-header>



<x-mary-card  shadow >


    <x-mary-table :headers="$headers" :rows="$records" :sort-by="$sortBy" striped @row-click="alert($event.detail.name)" with-pagination />

    </x-mary-card>


    <x-mary-drawer wire:model="showDrawer" title="Filters" right separator with-close-button ... >

    <div class="grid gap-5"> 
        <x-mary-input placeholder="Search..." ... />
        <x-mary-select placeholder="Authors" wire:model.live="author_id" :options="$authors" icon="o-flag" placeholder-value="0" /> 
    </div>



    </x-mary-drawer>


    <livewire:flash-message :msg="['type' => 'warning', 'text' => $conf['index']['noItemText'] ]">


</div>

</div>

