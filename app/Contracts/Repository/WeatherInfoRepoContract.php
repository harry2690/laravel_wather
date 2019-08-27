<?php

namespace App\Contracts\Repository;

use App\Contracts\Entity\WeatherInfo;

interface WeatherInfoRepoContract extends BaseRepoContract
{
    /**
     * @return WeatherInfo
     */
    public function make(): WeatherInfo;
}
