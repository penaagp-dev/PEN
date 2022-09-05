<?php

use App\Http\Controllers\Sample\ExampleController;
use Illuminate\Support\Facades\Route;

Route::controller(ExampleController::class)->group(function() {
    Route::get('/', 'getAllData')->name('sample.getAll');
    Route::post('/', 'createData')->name('sample.createData');
    Route::get('/{example}', 'getDataById')->name('sample.getById');
    Route::patch('/{example}', 'updateData')->name('sample.updateData');
    Route::delete('/{example}', 'deleteData')->name('sample.deleteData');
});