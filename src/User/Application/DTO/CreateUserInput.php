<?php

namespace Fitpal\User\Application\DTO;

use Fitpal\User\Domain\{
    UserEmail,
    UserName,
    UserPassword,
    UserRole
};

class CreateUserInput
{
    public function __construct(
        public readonly UserName $name,
        public readonly UserEmail $email,
        public readonly UserPassword $password,
        public readonly UserRole $role
    ) {}

    public static function fromPrimitives(
        string $name,
        string $email,
        string $password,
        string $role
    ): self {
        return new self(
            new UserName($name),
            new UserEmail($email),
            new UserPassword($password),
            UserRole::from($role)
        );
    }
}
