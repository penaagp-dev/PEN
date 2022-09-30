<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ExampleRepoInterfaces;
use App\Interfaces\GaleryRepoInterfaces;
use App\Interfaces\GenerationRepoInterfaces;
use App\Repositories\ExampleRepository;
use App\Repositories\GenerationRepository;
use App\Repositories\GeneralInformationRepository;
use App\Interfaces\GeneralInformationRepoInterfaces;
use App\Repositories\GaleryRepository;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ExampleRepoInterfaces::class, ExampleRepository::class);

        $this->app->bind(GeneralInformationRepoInterfaces::class, GeneralInformationRepository::class);
        $this->app->bind(GenerationRepoInterfaces::class, GenerationRepository::class);
        $this->app->bind(GaleryRepoInterfaces::class, GaleryRepository::class);
    }

    public function boot()
    {
        //
    }
}
