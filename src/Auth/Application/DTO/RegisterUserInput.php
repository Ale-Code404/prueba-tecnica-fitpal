<?php

namespace Fitpal\Auth\Application\DTO;

use Fitpal\User\Domain\UserName;

use Fitpal\Auth\Domain\{
    AuthPassword,
    AuthUsername
};

class RegisterUserInput
{
    public function __construct(
        public readonly UserName $name,
        public readonly AuthUsername $email,
        public readonly AuthPassword $password
    ) {}

    public static function fromPrimitives(
        string $name,
        string $email,
        string $password
    ): self {
        return new self(
            new UserName($name),
            new AuthUsername($email),
            new AuthPassword($password)
        );
    }
}
