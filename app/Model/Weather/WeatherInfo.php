<?php

namespace App\Model\Weather;

use App\Support\Contracts\Serializable;
use InvalidArgumentException;
use DateTime;

/**
 * @property DateTime $start_time
 * @property DateTime $end_time
 * @property int $temperature
 */
class WeatherInfo implements Serializable
{
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->setStartTime(new DateTime($data['startTime']));
        $this->setEndTime(new DateTime($data['endTime']));
        $this->setTemperature($data['elementValue']['value']);
    }

    /**
     * @return DateTime
     */
    public function getStartTime(): DateTime
    {
        return $this->start_time;
    }

    /**
     * @param DateTime $start_time
     */
    public function setStartTime(DateTime $start_time)
    {
        $this->start_time = $start_time;
    }

    /**
     * @return DateTime
     */
    public function getEndTime(): DateTime
    {
        return $this->end_time;
    }

    /**
     * @param DateTime $end_time
     */
    public function setEndTime(DateTime $end_time)
    {
        $this->end_time = $end_time;
    }

    /**
     * @return int
     */
    public function getTemperature(): int
    {
        return $this->temperature;
    }

    /**
     * @param int $temperature
     */
    public function setTemperature(int $temperature)
    {
        $this->temperature = $temperature;
    }

    /**
     * @inheritDoc
     */
    public function normalize()
    {
        return [
            'start_time' => $this->getStartTime(),
            'end_time' => $this->getEndTime(),
            'temperature' => $this->getTemperature(),
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
