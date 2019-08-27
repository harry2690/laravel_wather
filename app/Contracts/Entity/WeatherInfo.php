<?php

namespace App\Contracts\Entity;

use DateTime;

interface WeatherInfo extends BaseEntity
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return int
     */
    public function getSectionId(): int;

    /**
     * @param int $section_id
     */
    public function setSectionId(int $section_id);

    /**
     * @return DateTime
     */
    public function getStartTime(): DateTime;

    /**
     * @param DateTime $start_time
     */
    public function setStartTime(DateTime $start_time);

    /**
     * @return DateTime
     */
    public function getEndTime(): DateTime;

    /**
     * @param DateTime $end_time
     */
    public function setEndTime(DateTime $end_time);

    /**
     * @return int
     */
    public function getTemperature(): int;

    /**
     * @param int $temperature
     */
    public function setTemperature(int $temperature);
}
