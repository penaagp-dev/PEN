<?php

use App\Http\Controllers\CMS\CalonAnggotaController;
use App\Http\Controllers\CMS\GaleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CMS\GenerationController;
use App\Http\Controllers\Sample\ExampleController;
use App\Http\Controllers\CMS\GeneralInformationController;
use App\Http\Controllers\CMS\SocialMediaController;

Route::get('/', function () {
    return view('Web.Index');
})->name('index');

Route::get('/recruitment', function () {
    return view('Web.Recruitment');
})->name('recruitment');

Route::get('/cms/dashboard', function () {
    return view('Pages.Dashboard');
})->name('cms.dashboard');

Route::get('/cms/example', function () {
    return view('Pages.Example');
})->name('cms.example');

Route::get('/cms/general_information', function () {
    return view('Pages.GeneralInformation');
})->name('cms.general_info');

Route::get('/cms/generation', function () {
    return view('Pages.Generation');
})->name('cms.generation');

Route::get('/cms/galery', function () {
    return view('Pages.Galery');
})->name('cms.galery');

Route::get('/cms/socialmedia', function () {
    return view('Pages.SocialMedia');
})->name('cms.social_media');

Route::prefix('v1/example')->controller(ExampleController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{example}', 'getDataById');
    Route::delete('/{example}', 'deleteData');
});

Route::prefix('v1/general_information')->controller(GeneralInformationController::class)->group(function () {
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

Route::prefix('v1/galery')->controller(GaleryController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{generation}', 'getDataById');
    Route::delete('/{generation}', 'deleteData');
});

Route::prefix('v1/socialmedia')->controller(SocialMediaController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{socialmedia}', 'getDataById');
    Route::delete('/{socialmedia}', 'deleteData');
});

Route::prefix('v2/recrutment')->controller(CalonAnggotaController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::post('/', 'upsertData');
    Route::get('/{calon_anggota}', 'getDataById');
    Route::delete('/{calon_anggota}', 'deleteData');
});
