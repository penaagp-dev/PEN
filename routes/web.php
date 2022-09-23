<?php

use App\Http\Controllers\CMS\DashboardController;
use App\Http\Controllers\CMS\GaleryController;
use App\Http\Controllers\CMS\GenerationController;
use App\Http\Controllers\Sample\ExampleController;
use Illuminate\Support\Facades\Route;

Route::prefix('example')->controller(ExampleController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{example}', 'getDataById');
    Route::delete('/{example}', 'deleteData');
});

Route::prefix('generation')->controller(GenerationController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{generation}', 'getDataById');
    Route::delete('/{generation}', 'deleteData');
});

Route::get('/', [DashboardController::class, 'index']);
Route::get('/galery', [GaleryController::class, 'index']);
Route::post('create', [GaleryController::class, 'store'])->name('galery.store');



