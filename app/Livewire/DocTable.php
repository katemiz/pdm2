<?php

namespace App\Livewire;

use App\Models\Document;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class DocTable extends PowerGridComponent
{
    public string $tableName = 'doc-table-xln36x-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount()
                ->includeViewOnTop('components.datatable.footer-top'),
        ];
    }







    // public function header(): array
    // {
    //     return [
    //         Button::add('bulk-delete')
    //             ->slot('Bulk delete (<span x-text="window.pgBulkActions.count(\'' . $this->tableName . '\')"></span>)')
    //             ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
    //             ->dispatch('bulkDelete.' . $this->tableName, []),
    //     ];
    // }





    public function datasource(): Builder
    {
        return Document::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {


        return PowerGrid::fields()
            ->add('id')
            ->add('title');


    }

    public function columns(): array
    {
        return [
            // Column::action('Action'),

            Column::add()
                ->title('ID')
                ->field('id'),


                Column::add()
                ->title('Doc No')
                ->field('DocNo'),


            Column::add()
                ->title('Title')
                ->field('title'),

            Column::add()
                ->title('Lang')
                ->field('language'),


                Column::add()
                ->title('Doc Type')
                ->field('doc_type'),



            Column::add()
                ->title('Author')
                ->field('user_id', 'author'),



                Column::make(title: 'Price', field: 'revision'),
        ];
    }

    public function filters(): array
    {


        return [
            Filter::inputText('language')->placeholder('language'),

            Filter::select('doc_type', 'doc_type')
                ->dataSource(config('conf_documents.docTypes'))
                ->optionLabel('name')
                ->optionValue('id'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    // public function actions(Document $row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->slot('Edit: '.$row->id)
    //             ->id()
    //             ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
    //             ->dispatch('edit', ['rowId' => $row->id])
    //     ];
    // }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
