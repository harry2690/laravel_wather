<?php

namespace App\Repository;

use App\Contracts\Repository\BaseRepoContract;
use Prettus\Repository\Eloquent\BaseRepository;

abstract class BaseRepo extends BaseRepository implements BaseRepoContract
{
    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
    }
}
