<?php

namespace App\Facades;

use App\Contracts\Repository\SectionInfoRepoContract;
use Illuminate\Support\Facades\Facade;

class SectionInfoRepo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SectionInfoRepoContract::class;
    }
}
