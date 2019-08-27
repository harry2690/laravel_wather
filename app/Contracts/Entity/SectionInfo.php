<?php

namespace App\Contracts\Entity;

interface SectionInfo extends BaseEntity
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getCityCode(): string;

    /**
     * @param string $city_code
     */
    public function setCityCode(string $city_code);

    /**
     * @return int
     */
    public function getGeoCode(): int;

    /**
     * @param int $geo_code
     */
    public function setGeoCode(int $geo_code);

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at);

    /**
     * @return mixed
     */
    public function getUpdatedAt();

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at);
}
