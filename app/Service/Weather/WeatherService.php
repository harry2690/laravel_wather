<?php

namespace App\Service\Weather;

use App\API\Contracts\Weather\WeatherApiContract;
use App\Service\AccountCenter\ApiResponseService;

class WeatherService
{
    private $weatherApi;
    private $responseService;

    public function __construct(
        WeatherApiContract $weatherApi,
        ApiResponseService $responseService
    ) {
        $this->weatherApi = $weatherApi;
        $this->responseService  = $responseService;
    }

    public function getWeekWeatherByCity(string $cityCode)
    {
        $response = $this->weatherApi->getCityWeekInfo($cityCode);

        if (!$this->responseService->isSuccess($response)) {
            return null;
        }

        $weather = $this->responseService->handleWeekList($response);

        return $weather;
    }
}
