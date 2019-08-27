<?php

namespace App\Contracts\Repository;

use App\Contracts\Entity\SectionInfo;

interface SectionInfoRepoContract extends BaseRepoContract
{
    /**
     * @return SectionInfo
     */
    public function make(): SectionInfo;
}
