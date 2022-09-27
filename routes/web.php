<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMS\GenerationController;
use App\Http\Controllers\Sample\ExampleController;
use App\Http\Controllers\CMS\GeneralInformationController;

Route::get('/', function () {
    return view('Pages.Dashboard');
});

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
Route::prefix('generation')->controller(GenerationController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{generation}', 'getDataById');
    Route::delete('/{generation}', 'deleteData');
});
