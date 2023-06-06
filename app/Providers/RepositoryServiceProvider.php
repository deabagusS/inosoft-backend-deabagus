<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\KendaraanRepositoryInterface;
use App\Repositories\KendaraanRepository;
use App\Interfaces\MobilRepositoryInterface;
use App\Repositories\MobilRepository;
use App\Interfaces\MotorRepositoryInterface;
use App\Repositories\MotorRepository;
use App\Interfaces\PenjualanRepositoryInterface;
use App\Repositories\PenjualanRepository;

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
        $this->app->bind(PenjualanRepositoryInterface::class, PenjualanRepository::class);
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
