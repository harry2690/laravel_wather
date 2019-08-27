<?php

namespace App\Facades;

use App\Contracts\Repository\WeatherInfoRepoContract;
use Illuminate\Support\Facades\Facade;

class WeatherInfoRepo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return WeatherInfoRepoContract::class;
    }
}
