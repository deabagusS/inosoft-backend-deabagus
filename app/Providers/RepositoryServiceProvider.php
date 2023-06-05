<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\KendaraanRepositoryInterface;
use App\Repositories\KendaraanRepository;
use App\Interfaces\MobilRepositoryInterface;
use App\Repositories\MobilRepository;
use App\Interfaces\MotorRepositoryInterface;
use App\Repositories\MotorRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(KendaraanRepositoryInterface::class, KendaraanRepository::class);
        $this->app->bind(MobilRepositoryInterface::class, MobilRepository::class);
        $this->app->bind(MotorRepositoryInterface::class, MotorRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
