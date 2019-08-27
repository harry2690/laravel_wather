<?php

namespace App\Service\AccountCenter;

use App\Model\Weather\WeekWeather;
use Symfony\Component\HttpFoundation\Response;

class ApiResponseService
{
    public function isSuccess(Response $response): bool
    {
        if (!$response->isOk()) {
            return false;
        }

        $content = $response->getContent();

        $data = json_decode($content, true);

        if (!array_key_exists('cwbopendata', $data)) {
            return false;
        }

        $data = $data['cwbopendata'];

        if (!array_key_exists('dataset', $data)) {
            return false;
        }

        return true;
    }

    /**
     * @param Response $response
     * @return array|WeekWeather[]
     */
    public function handleWeekList(Response $response)
    {
        $result = [];

        if (!$this->isSuccess($response)) {
            return $result;
        }

        $content = $response->getContent();

        $data = json_decode($content, true);

        foreach ($data['cwbopendata']['dataset']['locations']['location'] as $item) {
            $weekWeather                             = WeekWeather::denormalize($item);
            $result[$weekWeather->getLocationName()] = $weekWeather;
        }

        return $result;
    }
}
