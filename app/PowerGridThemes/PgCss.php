<?php

namespace App\PowerGridThemes;

use \PowerComponents\LivewirePowerGrid\Themes\Tailwind;

class PgCss extends Tailwind
{

    public string $name = 'tailwind';

    public function table(): array
    {
        return [
            'layout' => [
                'base'      => 'bg-slate-300 border border-1 p-4',
                'div'       => 'bg-green-300 p-4',
                'table'     => 'bg-gray-300',
                'container' => 'bg-yellow-300 p-4',
                'actions'   => 'flex gap-20',
            ],

            'header' => [
                'thead'    => '',
                'tr'       => '',
                'th'       => 'font-extrabold px-3 py-3 text-left text-xs text-pg-primary-700 tracking-wider whitespace-nowrap dark:text-pg-primary-300',
                'thAction' => '!font-bold',
            ],

            'body' => [
                'tbody'              => 'text-pg-primary-800',
                'tbodyEmpty'         => '',
                'tr'                 => 'border-b border-pg-primary-100 dark:border-pg-primary-600 hover:bg-pg-primary-50 dark:bg-pg-primary-800 dark:hover:bg-pg-primary-700',
                'td'                 => 'px-3 py-2 whitespace-nowrap dark:text-pg-primary-200',
                'tdEmpty'            => 'p-2 whitespace-nowrap dark:text-pg-primary-200',
                'tdSummarize'        => 'p-2 whitespace-nowrap dark:text-pg-primary-200 text-sm text-pg-primary-600 text-right space-y-2',
                'trSummarize'        => '',
                'tdFilters'          => '',
                'trFilters'          => '',
                'tdActionsContainer' => 'flex gap-2',
            ],
        ];
    }

    public function footer(): array
    {
        return [
            'view'                   => $this->root() . '.footer',
            'select'                 => 'appearance-none !bg-none focus:ring-primary-600 focus-within:focus:ring-primary-600 focus-within:ring-primary-600 dark:focus-within:ring-primary-600 flex rounded-md ring-1 transition focus-within:ring-2 dark:ring-pg-primary-600 dark:text-pg-primary-300 text-gray-600 ring-gray-300 dark:bg-pg-primary-800 bg-white dark:placeholder-pg-primary-400 rounded-md border-0 bg-transparent py-1.5 px-4 pr-7 ring-0 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 w-auto',
            'footer'                 => '',
            'footer_with_pagination' => 'md:flex md:flex-row w-full items-center py-3 bg-white overflow-y-auto pl-2 pr-2 relative dark:bg-pg-primary-900',
        ];
    }

    public function cols(): array
    {
        return [
            'div' => 'select-none flex items-center gap-1',
        ];
    }

    public function editable(): array
    {
        return [
            'view'  => $this->root() . '.editable',
            'input' => 'focus:ring-primary-600 focus-within:focus:ring-primary-600 focus-within:ring-primary-600 dark:focus-within:ring-primary-600 flex rounded-md ring-1 transition focus-within:ring-2 dark:ring-pg-primary-600 dark:text-pg-primary-300 text-gray-600 ring-gray-300 dark:bg-pg-primary-800 bg-white dark:placeholder-pg-primary-400 w-full rounded-md border-0 bg-transparent py-1.5 px-2 ring-0 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 w-full',
        ];
    }

    public function toggleable(): array
    {
        return [
            'view' => $this->root() . '.toggleable',
        ];
    }

    public function checkbox(): array
    {
        return [
            'th'    => 'px-6 py-3 text-left text-xs font-medium text-pg-primary-500 tracking-wider',
            'base'  => '',
            'label' => 'flex items-center space-x-3',
            'input' => 'form-checkbox dark:border-dark-600 border-1 dark:bg-dark-800 rounded border-gray-300 bg-white transition duration-100 ease-in-out h-4 w-4 text-primary-500 focus:ring-primary-500 dark:ring-offset-dark-900',
        ];
    }

    public function radio(): array
    {
        return [
            'th'    => 'px-6 py-3 text-left text-xs font-medium text-pg-primary-500 tracking-wider',
            'base'  => '',
            'label' => 'flex items-center space-x-3',
            'input' => 'form-radio rounded-full transition ease-in-out duration-100',
        ];
    }

    public function filterBoolean(): array
    {
        return [
            'view'   => $this->root() . '.filters.boolean',
            'base'   => 'min-w-[5rem]',
            'select' => 'appearance-none !bg-none focus:ring-primary-600 focus-within:focus:ring-primary-600 focus-within:ring-primary-600 dark:focus-within:ring-primary-600 flex rounded-md ring-1 transition focus-within:ring-2 dark:ring-pg-primary-600 dark:text-pg-primary-300 text-gray-600 ring-gray-300 dark:bg-pg-primary-800 bg-white dark:placeholder-pg-primary-400 w-full rounded-md border-0 bg-transparent py-1.5 px-2 ring-0 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 w-full',
        ];
    }

    public function filterDatePicker(): array
    {
        return [
            'base'  => '',
            'view'  => $this->root() . '.filters.date-picker',
            'input' => 'flatpickr flatpickr-input focus:ring-primary-600 focus-within:focus:ring-primary-600 focus-within:ring-primary-600 dark:focus-within:ring-primary-600 flex rounded-md ring-1 transition focus-within:ring-2 dark:ring-pg-primary-600 dark:text-pg-primary-300 text-gray-600 ring-gray-300 dark:bg-pg-primary-800 bg-white dark:placeholder-pg-primary-400 w-full rounded-md border-0 bg-transparent py-1.5 px-2 ring-0 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 w-auto',
        ];
    }

    public function filterMultiSelect(): array
    {
        return [
            'view'   => $this->root() . '.filters.multi-select',
            'base'   => 'inline-block relative w-full',
            'select' => 'mt-1',
        ];
    }

    public function filterNumber(): array
    {
        return [
            'view'  => $this->root() . '.filters.number',
            'input' => 'w-full min-w-[5rem] block focus:ring-primary-600 focus-within:focus:ring-primary-600 focus-within:ring-primary-600 dark:focus-within:ring-primary-600 flex rounded-md ring-1 transition focus-within:ring-2 dark:ring-pg-primary-600 dark:text-pg-primary-300 text-gray-600 ring-gray-300 dark:bg-pg-primary-800 bg-white dark:placeholder-pg-primary-400 rounded-md border-0 bg-transparent py-1.5 pl-2 ring-0 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6',
        ];
    }

    public function filterSelect(): array
    {
        return [
            'view'   => $this->root() . '.filters.select',
            'base'   => '',
            'select' => 'appearance-none !bg-none focus:ring-primary-600 focus-within:focus:ring-primary-600 focus-within:ring-primary-600 dark:focus-within:ring-primary-600 flex rounded-md ring-1 transition focus-within:ring-2 dark:ring-pg-primary-600 dark:text-pg-primary-300 text-gray-600 ring-gray-300 dark:bg-pg-primary-800 bg-white dark:placeholder-pg-primary-400 rounded-md border-0 bg-transparent py-1.5 px-2 ring-0 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 w-full',
        ];
    }

    public function filterInputText(): array
    {
        return [
            'view'   => $this->root() . '.filters.input-text',
            'base'   => 'min-w-[9.5rem]',
            'select' => 'appearance-none !bg-none focus:ring-primary-600 focus-within:focus:ring-primary-600 focus-within:ring-primary-600 dark:focus-within:ring-primary-600 flex rounded-md ring-1 transition focus-within:ring-2 dark:ring-pg-primary-600 dark:text-pg-primary-300 text-gray-600 ring-gray-300 dark:bg-pg-primary-800 bg-white dark:placeholder-pg-primary-400 w-full rounded-md border-0 bg-transparent py-1.5 px-2 ring-0 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 w-full',
            'input'  => 'focus:ring-primary-600 focus-within:focus:ring-primary-600 focus-within:ring-primary-600 dark:focus-within:ring-primary-600 flex rounded-md ring-1 transition focus-within:ring-2 dark:ring-pg-primary-600 dark:text-pg-primary-300 text-gray-600 ring-gray-300 dark:bg-pg-primary-800 bg-white dark:placeholder-pg-primary-400 w-full rounded-md border-0 bg-transparent py-1.5 px-2 ring-0 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 w-full',
        ];
    }

    public function searchBox(): array
    {
        return [
            'input'      => 'focus:ring-primary-600 focus-within:focus:ring-primary-600 focus-within:ring-primary-600 dark:focus-within:ring-primary-600 flex items-center rounded-md ring-1 transition focus-within:ring-2 dark:ring-pg-primary-600 dark:text-pg-primary-300 text-red-600 ring-gray-300 dark:bg-pg-primary-800 bg-white dark:placeholder-pg-primary-400 w-full rounded-md border-0 bg-transparent py-1.5 px-2 ring-0 placeholder:text-gray-400 focus:outline-none sm:text-sm sm:leading-6 w-full pl-8',
            'iconClose'  => 'text-pg-primary-400 dark:text-pg-primary-200',
            'iconSearch' => 'text-pg-primary-300 mr-2 w-12 h-5 dark:text-pg-primary-200',
        ];
    }
}
