<?php

namespace App\Contracts\Entity;

use App\Support\Enums\RoleEnum;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable;
use Spatie\Permission\Models\Role;

interface User extends BaseEntity, Authenticatable, Authorizable
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @return string
     */
    public function getEmail(): string;
}
