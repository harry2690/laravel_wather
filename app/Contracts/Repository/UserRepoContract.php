<?php

namespace App\Contracts\Repository;

use App\Contracts\Entity\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\ParameterBag;

interface UserRepoContract extends BaseRepoContract
{
    /**
     * @return User
     */
    public function make(): User;

    /**
     * @param $id
     * @return User|null
     */
    public function findById($id): ?User;

    /**
     * @param User $user
     * @param int  $limit
     * @return LengthAwarePaginator|null
     */
    public function findByPage(User $user, int $limit): ?LengthAwarePaginator;

    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User;

    /**
     * @return Collection|User[]
     */
    public function findCustomers(): Collection;

    /**
     * @param ParameterBag $bag
     * @param User         $user
     * @param int          $limit
     * @return LengthAwarePaginator|null
     */
    public function findBySearch(ParameterBag $bag, User $user, int $limit): ?LengthAwarePaginator;
}
