<?php

namespace App\Providers;

use App\Interfaces\ExampleRepoInterfaces;
use App\Interfaces\GenerationRepoInterfaces;
use App\Repositories\ExampleRepository;
use App\Repositories\GenerationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ExampleRepoInterfaces::class, ExampleRepository::class);
        $this->app->bind(GenerationRepoInterfaces::class, GenerationRepository::class);
    }

    public function boot()
    {
        //
    }
}
