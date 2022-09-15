<?php

namespace App\Providers;

use App\Interfaces\ExampleRepoInterfaces;
use App\Repositories\ExampleRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ExampleRepoInterfaces::class, ExampleRepository::class);
    }

    public function boot()
    {
        //
    }
}
