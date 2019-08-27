<?php

namespace App\Repository;

use App\Contracts\Entity\User;
use App\Contracts\Repository\UserRepoContract;
use App\Model\Eloquent\UserEloquent;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Symfony\Component\HttpFoundation\ParameterBag;

class UserRepo extends BaseRepo implements UserRepoContract
{
    public function make(): User
    {
        return new UserEloquent();
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        return UserEloquent::class;
    }

    /**
     * @inheritDoc
     */
    public function findById($id): ?User
    {
        return UserEloquent::where('id', $id)->first();
    }

    /**
     * @inheritDoc
     */
    public function findByPage(User $user, int $limit): ?LengthAwarePaginator
    {
        return $this->useRole($user)->paginate($limit);
    }

    /**
     * @inheritDoc
     */
    public function findByEmail(string $email): ?User
    {
        return $this->findByField('email', $email)->first();
    }

    /**
     * @inheritDoc
     */
    public function findCustomers(): Collection
    {
        return UserEloquent::whereHas('roles', function ($query) {
            /* @var Builder $query */
            $query->where('role_id', 3);
        })->get();
    }

    /**
     * @inheritDoc
     */
    public function findBySearch(ParameterBag $bag, User $user, int $limit): ?LengthAwarePaginator
    {
        $model = $this->useRole($user);

        if (!empty($bag->get('id'))) {
            $model->where('id', $bag->get('id'));
        }

        if (!empty($bag->get('name'))) {
            $model->where('name', 'like', '%' . $bag->get('name') . '%');
        }

        if (!empty($bag->get('email'))) {
            $model->where('email', 'like', '%' . $bag->get('email') . '%');
        }

        if (!empty($bag->get('role'))) {
            $role = $bag->get('role');
            $model->whereHas('roles', function ($query) use ($role) {
                /* @var Builder $query */
                $query->where('name', $role);
            });
        }

        return $model->paginate($limit);
    }

    /**
     * @param User $user
     * @return UserEloquent;
     */
    private function useRole(User $user)
    {
        return UserEloquent::whereHas('roles', function ($query) use ($user) {
            /* @var Builder $query */
            if ($user->isAdmin()) {
                $query->where('role_id', '<>', 1);
            }

            if ($user->isCustomerService()) {
                $query->where('role_id', '>', 2);
            }
        });
    }
}
