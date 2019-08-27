<?php

namespace App\Repository;

use App\Contracts\Entity\SectionInfo;
use App\Contracts\Repository\SectionInfoRepoContract;
use App\Model\Eloquent\SectionInfoEloquent;

class SectionInfoRepo extends BaseRepo implements SectionInfoRepoContract
{
    public function make(): SectionInfo
    {
        return new SectionInfoEloquent();
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        return SectionInfoEloquent::class;
    }
}
