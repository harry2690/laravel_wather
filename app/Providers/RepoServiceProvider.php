<?php

namespace App\Providers;

use App\Contracts\Repository\SectionInfoRepoContract;
use App\Contracts\Repository\UserRepoContract;
use App\Contracts\Repository\WeatherInfoRepoContract;
use App\Repository\SectionInfoRepo;
use App\Repository\UserRepo;
use App\Repository\WeatherInfoRepo;
use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepoContract::class, UserRepo::class);
        $this->app->bind(SectionInfoRepoContract::class, SectionInfoRepo::class);
        $this->app->bind(WeatherInfoRepoContract::class, WeatherInfoRepo::class);
    }
}
