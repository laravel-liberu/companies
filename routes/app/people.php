<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Companies\Http\Controllers\Person\Create;
use LaravelLiberu\Companies\Http\Controllers\Person\Destroy;
use LaravelLiberu\Companies\Http\Controllers\Person\Edit;
use LaravelLiberu\Companies\Http\Controllers\Person\Index;
use LaravelLiberu\Companies\Http\Controllers\Person\Store;
use LaravelLiberu\Companies\Http\Controllers\Person\Update;

Route::prefix('people')
    ->as('people.')
    ->group(function () {
        Route::get('{company}', Index::class)->name('index');
        Route::get('{company}/create', Create::class)->name('create');
        Route::get('{company}/{person}/edit', Edit::class)->name('edit');
        Route::patch('{person}', Update::class)->name('update');
        Route::post('', Store::class)->name('store');
        Route::delete('{company}/{person}', Destroy::class)->name('destroy');
    });
