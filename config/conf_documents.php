<?php

/*
    modelTitle          : Variable to be used in javascript confirm dialogs. [Delete, Freeze, Release etc Confirm]
*/

return [

    'modelTitle' => 'Document',

    'index' => [
        'title' => 'Documents',
        'subtitle' => 'List of All Documents',
        'route' => '/docs',
        'addBtnTitle' => 'Add Document',
        'noItemText' => 'No documents found in the database!',
    ],

    'formCreate' => [
        'title' => 'Documents',
        'subtitle' => 'Add New Document',
        'route' => '/docs/create',
        'buttonTitle' => 'Add Document',
    ],

    'formEdit' => [
        'title' => 'Documents',
        'subtitle' => 'Update Existing Document Parameters',
        'route' => '/docs/{id}/edit',
        'buttonTitle' => 'Update Document',
    ],

    'show' => [
        'title' => 'Documents',
        'subtitle' => 'Document Details and Properties',
        'route' => '/docs/{id}'
    ],

    'store' => [
        'route' => '/docs'
    ],

    'update' => [
        'route' => '/docs/{id}'
    ],


    'table' =>  [

        'id' => [
            'label' => 'No',
            'visibility' => false,
            'sortable' => false,
            'wrapText' => true,
            'hasViewLink' => false,
        ],

        'user_id' => [
            'label' => 'Prepared By',
            'visibility' => false,
            'sortable' => false,
            'wrapText' => true,
            'hasViewLink' => false,
        ],

        'DocNo' => [
            'label' => 'No',
            'visibility' => true,
            'sortable' => true,
            'wrapText' => false,
            'hasViewLink' => true,
        ],

        'company_id' => [
            'label' => 'Company',
            'visibility' => false,
            'sortable' => false,
            'wrapText' => true,
            'hasViewLink' => false,
        ],

        'title' => [
            'label' => 'Title',
            'visibility' => true,
            'sortable' => true,
            'wrapText' => true,
            'hasViewLink' => false,
        ],


        'Author' => [
            'label' => 'Author',
            'visibility' => true,
            'sortable' => true,
            'wrapText' => true,
            'hasViewLink' => false,
        ],

        'created_at' => [
            'label' => 'Created At',
            'visibility' => true,
            'sortable' => true,
            'wrapText' => true,
            'hasViewLink' => false,
        ],

        'updated_at' => [
            'label' => 'Updated At',
            'visibility' => false,
            'sortable' => false,
            'wrapText' => true,
            'hasViewLink' => false,
        ],

    ],


    'docTypes' => [

        ['id' => 'GR', 'name' => 'General Document'],
        ['id' => 'TR', 'name' => 'Test Report'],
        ['id' => 'AR', 'name' => 'Analysis Document'],
        ['id' => 'MN', 'name' => 'User Manual'],
        ['id' => 'ME', 'name' => 'Memo'],
        ['id' => 'PR', 'name' => 'Presentation'],
    ],

    'languages' => [

        ['id' => 'EN', 'name' => 'English'],
        ['id' => 'TR', 'name' => 'Türkçe'],
    ]



];
