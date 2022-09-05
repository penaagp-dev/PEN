<?php

namespace App\Providers;

use App\Interfaces\ExampleInterface;
use App\Repositories\ExampleInterfaceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ExampleInterface::class, ExampleInterfaceRepository::class);
    }

    public function boot()
    {
        //
    }
}
