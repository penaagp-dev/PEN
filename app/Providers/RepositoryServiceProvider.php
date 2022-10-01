<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ExampleRepoInterfaces;
use App\Interfaces\GenerationRepoInterfaces;
use App\Repositories\ExampleRepository;
use App\Repositories\GenerationRepository;
use App\Repositories\GeneralInformationRepository;
use App\Interfaces\GeneralInformationRepoInterfaces;
use App\Interfaces\SocialMediaRepoInterfaces;
use App\Repositories\SocialMediaRepository;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ExampleRepoInterfaces::class, ExampleRepository::class);
        $this->app->bind(GeneralInformationRepoInterfaces::class, GeneralInformationRepository::class);
        $this->app->bind(GenerationRepoInterfaces::class, GenerationRepository::class);
        $this->app->bind(SocialMediaRepoInterfaces::class, SocialMediaRepository::class);
    }

    public function boot()
    {
        //
    }
}
