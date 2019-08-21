<?php

namespace App\API\Contracts\Weather;

use Symfony\Component\HttpFoundation\Response;

interface WeatherApiContract
{
    /**
     * @param string $cityCode
     * @return Response
     */
    public function getCityWeekInfo(string $cityCode): Response;
}
