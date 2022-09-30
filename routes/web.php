<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMS\GenerationController;
use App\Http\Controllers\Sample\ExampleController;
use App\Http\Controllers\CMS\GeneralInformationController;

Route::get('/', function () {
    return view('Pages.Dashboard');
});

Route::get('/example', function () {
    return view('Pages.Example');
});

Route::get('/general-information', function () {
    return view('Pages.GeneralInformation');
});

Route::get('/generation', function () {
    return view('Pages.Generation');
});

Route::prefix('v1/example')->controller(ExampleController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{example}', 'getDataById');
    Route::delete('/{example}', 'deleteData');
});

Route::prefix('v1/GeneralInformation')->controller(GeneralInformationController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{general_information}', 'getDataById');
    Route::delete('/{general_information}', 'deleteData');
});
Route::prefix('v1/generation')->controller(GenerationController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{generation}', 'getDataById');
    Route::delete('/{generation}', 'deleteData');
});
