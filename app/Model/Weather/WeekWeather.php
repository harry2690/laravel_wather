<?php

namespace App\Model\Weather;

use App\Support\Contracts\Serializable;
use InvalidArgumentException;

/**
 * @property string $location_name
 * @property int $geo_code
 * @property WeatherInfo[] $weather_info_list
 */
class WeekWeather implements Serializable
{
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->setLocationName($data['locationName']);
        $this->setGeoCode($data['geocode']);
        $weatherInfoList = [];
        foreach ($data['weatherElement'] as $weatherElement) {
            if($weatherElement['elementName'] === 'T') {
                foreach ($weatherElement['time'] as $weatherInfo) {
                    $weatherInfoList[] = WeatherInfo::denormalize($weatherInfo);
                }
                break;
            }
        }
        $this->setWeatherInfoList($weatherInfoList);
    }

    /**
     * @return string
     */
    public function getLocationName(): string
    {
        return $this->location_name;
    }

    /**
     * @param string $location_name
     */
    public function setLocationName(string $location_name)
    {
        $this->location_name = $location_name;
    }

    /**
     * @return int
     */
    public function getGeoCode(): int
    {
        return $this->geo_code;
    }

    /**
     * @param int $geo_code
     */
    public function setGeoCode(int $geo_code): void
    {
        $this->geo_code = $geo_code;
    }

    /**
     * @return WeatherInfo[]
     */
    public function getWeatherInfoList(): array
    {
        return $this->weather_info_list;
    }

    /**
     * @param WeatherInfo[] $weather_info_list
     */
    public function setWeatherInfoList(array $weather_info_list)
    {
        $this->weather_info_list = $weather_info_list;
    }

    /**
     * @inheritDoc
     */
    public function normalize()
    {
        return [
            'location_name' => $this->getLocationName(),
            'geo_code' => $this->getGeoCode(),
            'weather_info_list' => $this->getWeatherInfoList(),
        ];
    }

    /**
     * @inheritDoc
     */
    public static function denormalize(array $data)
    {
        return new self($data);
    }

    /**
     * @inheritDoc
     */
    public function serialize()
    {
        return json_encode($this->normalize());
    }

    /**
     * @inheritDoc
     */
    public static function deserialize($serialized)
    {
        $result = json_decode($serialized, true);

        if (!is_array($result)) {
            throw new InvalidArgumentException("'{$serialized}' is not a valid big pond domain format");
        }

        return static::denormalize($result);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->normalize();
    }
}
