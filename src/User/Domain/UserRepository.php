<?php

namespace Fitpal\User\Domain;

use Fitpal\User\Domain\UserId;

interface UserRepository
{
    public function findById(UserId $id): ?User;

    public function findByEmail(UserEmail $email): ?User;

    public function save(User $user): void;
}
