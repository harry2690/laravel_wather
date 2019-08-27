<?php

namespace App\Model\Eloquent;

use App\Contracts\Entity\SectionInfo;
use Eloquent;

/**
 * @property int    $id
 * @property string $city_code
 * @property int    $geo_code
 * @property string $name
 * @property mixed  $created_at
 * @property mixed  $updated_at
 */
class SectionInfoEloquent extends Eloquent implements SectionInfo
{
    /**
     * @var array
     */
    protected $fillable = [
        'city_code', 'geo_code', 'name', 'created_at', 'updated_at',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'section_info';

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
    public function getCityCode(): string
    {
        return $this->city_code;
    }

    /**
     * @inheritDoc
     */
    public function setCityCode(string $city_code)
    {
        $this->city_code = $city_code;
    }

    /**
     * @inheritDoc
     */
    public function getGeoCode(): int
    {
        return $this->geo_code;
    }

    /**
     * @inheritDoc
     */
    public function setGeoCode(int $geo_code)
    {
        $this->geo_code = $geo_code;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @inheritDoc
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @inheritDoc
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @inheritDoc
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}
