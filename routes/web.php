<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sample\ExampleController;
use App\Http\Controllers\CMS\GeneralInformationController;

Route::prefix('example')->controller(ExampleController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{example}', 'getDataById');
    Route::delete('/{example}', 'deleteData');
});

Route::prefix('GeneralInformation')->controller(GeneralInformationController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{general_information}', 'getDataById');
    Route::delete('/{general_information}', 'deleteData');
});