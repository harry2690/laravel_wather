<?php

namespace App\Repository;

use App\Contracts\Entity\WeatherInfo;
use App\Contracts\Repository\WeatherInfoRepoContract;
use App\Model\Eloquent\WeatherInfoEloquent;

class WeatherInfoRepo extends BaseRepo implements WeatherInfoRepoContract
{
    public function make(): WeatherInfo
    {
        return new WeatherInfoEloquent();
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        return WeatherInfoEloquent::class;
    }
}
