<?php

namespace App\Facades;

use App\Contracts\Repository\UserRepoContract;
use Illuminate\Support\Facades\Facade;

class UserRepo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return UserRepoContract::class;
    }
}
