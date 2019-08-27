<?php

namespace App\Model\Eloquent;

use App\Contracts\Entity\WeatherInfo;
use DateTime;
use Eloquent;

/**
 * @property int      $id
 * @property int      $section_id
 * @property DateTime $start_time
 * @property DateTime $end_time
 * @property int      $temperature
 */
class WeatherInfoEloquent extends Eloquent implements WeatherInfo
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'section_id', 'start_time', 'end_time', 'temperature',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'weather_info';

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getSectionId(): int
    {
        return $this->section_id;
    }

    /**
     * @inheritDoc
     */
    public function setSectionId(int $section_id): void
    {
        $this->section_id = $section_id;
    }

    /**
     * @inheritDoc
     */
    public function getStartTime(): DateTime
    {
        return $this->start_time;
    }

    /**
     * @inheritDoc
     */
    public function setStartTime(DateTime $start_time): void
    {
        $this->start_time = $start_time;
    }

    /**
     * @inheritDoc
     */
    public function getEndTime(): DateTime
    {
        return $this->end_time;
    }

    /**
     * @inheritDoc
     */
    public function setEndTime(DateTime $end_time): void
    {
        $this->end_time = $end_time;
    }

    /**
     * @inheritDoc
     */
    public function getTemperature(): int
    {
        return $this->temperature;
    }

    /**
     * @inheritDoc
     */
    public function setTemperature(int $temperature): void
    {
        $this->temperature = $temperature;
    }
}
