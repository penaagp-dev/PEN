<?php

use App\Http\Controllers\Sample\ExampleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.Dashboard');
});

Route::prefix('example')->controller(ExampleController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{example}', 'getDataById');
    Route::delete('/{example}', 'deleteData');
});
