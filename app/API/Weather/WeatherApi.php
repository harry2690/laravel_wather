<?php

namespace App\API\Weather;

use App\API\BasicApi;
use App\API\Contracts\Weather\WeatherApiContract;
use App\Exceptions\CityNotFoundException;
use App\Support\Enums\URI\WeatherURI;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Response;

class WeatherApi extends BasicApi implements WeatherApiContract
{
    private $url;
    private $key;
    private $dataType;
    private $headers;

    public function __construct(Client $client)
    {
        $this->url      = config('api.weather.api_url');
        $this->dataType = WeatherURI::API_TYPE;

        parent::__construct($client);
    }

    protected function getCustomerHeaders(): array
    {
        return $this->headers = [
            'Authorization' => config('api.weather.api_key'),
            'User-Agent'    => 'PostmanRuntime/7.15.2',
        ];
    }

    /**
     * @inheritDoc
     */
    public function getCityWeekInfo(string $cityCode): Response
    {
        if (!isset(WeatherURI::ALL_CITY_WEEK[$cityCode])) {
            throw new CityNotFoundException($cityCode . ' not found.');
        }

        $url = $this->url . WeatherURI::ALL_CITY_WEEK[$cityCode] . "?format={$this->dataType}";

        return $this->get($url);
    }
}
