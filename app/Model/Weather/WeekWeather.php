<?php

namespace App\Model\Weather;

use App\Support\Contracts\Serializable;
use InvalidArgumentException;

/**
 * @property string $location_name
 */
class WeekWeather implements Serializable
{
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->setLocationName($data['locationName']);
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
     * @inheritDoc
     */
    public function normalize()
    {
        return [
            'location_name' => $this->getLocationName(),
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
