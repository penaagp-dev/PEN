<?php

use App\Http\Controllers\CMS\AuthController;
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

Route::get('/cms/login', function () {
    return view('Auth.Login');
})->name('login');

Route::prefix('auth')->controller(AuthController::class)->group(function() {
    Route::post('/login_proccess', 'authenticate')->name('auth.loginproccess');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function() {
    Route::middleware('permission:getAll')->get('/cms/dashboard', function () {
        return view('Pages.Dashboard');
    })->name('cms.dashboard');

    Route::middleware('permission:getAll')->get('/cms/example', function () {
        return view('Pages.Example');
    })->name('cms.example');

    Route::middleware('permission:getAll')->get('/cms/general_information', function () {
        return view('Pages.GeneralInformation');
    })->name('cms.general_info');

    Route::middleware('permission:getAll')->get('/cms/generation', function () {
        return view('Pages.Generation');
    })->name('cms.generation');

    Route::middleware('permission:getAll')->get('/cms/galery', function () {
        return view('Pages.Galery');
    })->name('cms.galery');

    Route::middleware('permission:getAll')->get('/cms/socialmedia', function () {
        return view('Pages.SocialMedia');
    })->name('cms.social_media');

    Route::middleware('role:Super-Admin|Admin')->prefix('v1/general_information')->controller(GeneralInformationController::class)->group(function () {
        Route::middleware('permission:getAll')->get('/', 'getAllData');
        Route::middleware('permission:upsert')->post('/', 'upsertData');
        Route::middleware('permission:getById')->get('/{general_information}', 'getDataById');
        Route::middleware('permission:delete')->delete('/{general_information}', 'deleteData');
    });

    Route::middleware('role:Super-Admin|Admin')->prefix('v1/generation')->controller(GenerationController::class)->group(function () {
        Route::middleware('permission:getAll')->get('/', 'getAllData');
        Route::middleware('permission:upsert')->post('/', 'upsertData');
        Route::middleware('permission:getById')->get('/{generation}', 'getDataById');
        Route::middleware('permission:delete')->delete('/{generation}', 'deleteData');
    });

    Route::middleware('role:Super-Admin|Admin')->prefix('v1/galery')->controller(GaleryController::class)->group(function () {
        Route::middleware('permission:getAll')->get('/', 'getAllData');
        Route::middleware('permission:upsert')->post('/', 'upsertData');
        Route::middleware('permission:getById')->get('/{generation}', 'getDataById');
        Route::middleware('permission:delete')->delete('/{generation}', 'deleteData');
    });

    Route::middleware('role:Super-Admin|Admin')->prefix('v1/socialmedia')->controller(SocialMediaController::class)->group(function () {
        Route::middleware('permission:getAll')->get('/', 'getAllData');
        Route::middleware('permission:upsert')->post('/', 'upsertData');
        Route::middleware('permission:getById')->get('/{socialmedia}', 'getDataById');
        Route::middleware('permission:delete')->delete('/{socialmedia}', 'deleteData');
    });

});

Route::prefix('v2/recruitment')->controller(CalonAnggotaController::class)->group(function () {
    Route::middleware(['auth', 'permission:getAll'])->get('/', 'getAllData');
    Route::post('/up', 'upsertData')->name('recruitment.post');
    Route::middleware(['auth', 'permission:getById'])->get('/{calon_anggota}', 'getDataById');
    Route::middleware(['auth', 'permission:delete important'])->delete('/{calon_anggota}', 'deleteData');
});
