<?php

use Illuminate\Support\Facades\Route;

use Livewire\Volt\Volt;


use App\Livewire\Documents;
use App\Livewire\DocTable;

use App\Livewire\DocumentShow;
use App\Livewire\DocumentCreateUpdate;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';



Route::middleware(['auth'])->group(function () {

    // DOCUMENTS
    // *****************************************************************************
    // Route::get('/docs', Documents::class);

    // Route::get('/docs', DocTable::class);

    Route::view('/docs', 'docs-index');


    // Volt::route('/docs', 'docs.index');
    Volt::route('/docs/create', 'docs.create');     // User (create)
    Volt::route('/docs/{id}', 'docs.show');         // User (edit)
    Route::get('/docs/{id}/edit', DocumentCreateUpdate::class);


    // Route::get('/docs/create', DocumentCreateUpdate::class);
    // Route::post('/docs', DocumentCreateUpdate::class);
    // Route::get('/docs/{id}', DocumentShow::class);
    // Route::get('/docs/{id}/edit', DocumentCreateUpdate::class);
    // Route::patch('/docs/{id}', DocumentCreateUpdate::class);
    // Route::delete('/docs/{id}', DocumentCreateUpdate::class);

});



