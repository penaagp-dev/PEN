<?php

namespace App\Providers;

use App\Repositories\ExampleRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\ExampleRepoInterfaces;
use App\Repositories\GeneralInformationRepository;
use App\Interfaces\GeneralInformationRepoInterfaces;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ExampleRepoInterfaces::class, ExampleRepository::class);

        $this->app->bind(GeneralInformationRepoInterfaces::class, GeneralInformationRepository::class);
    }

    public function boot()
    {
        //
    }
}
