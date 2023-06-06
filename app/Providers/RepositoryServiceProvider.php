<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\KendaraanRepositoryInterface;
use App\Repositories\KendaraanRepository;
use App\Interfaces\PenjualanRepositoryInterface;
use App\Repositories\PenjualanRepository;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;

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
        $this->app->bind(PenjualanRepositoryInterface::class, PenjualanRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
