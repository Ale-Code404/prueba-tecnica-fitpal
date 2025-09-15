<?php

namespace Fitpal\User\Infra\Persistence;

use Fitpal\User\Domain\{
    User,
    UserEmail,
    UserId,
    UserRepository
};

class InMemoryUserRepository implements UserRepository
{
    /** @var array<string, User> */
    private array $users = [];

    public function __construct(array $users = [])
    {
        $this->users = $users;
    }

    public function findById(UserId $id): ?User
    {
        return $this->users[$id->value()] ?? null;
    }

    public function findByEmail(UserEmail $email): ?User
    {
        foreach ($this->users as $user) {
            if ($user->email()->equals($email)) {
                return $user;
            }
        }

        return null;
    }

    public function save(User $user): void
    {
        $this->users[$user->id()->value()] = $user;
    }
}
