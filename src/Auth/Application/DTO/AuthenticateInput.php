<?php

namespace Fitpal\Auth\Application\DTO;

use Fitpal\Auth\Domain\{
    AuthPassword,
    AuthUsername
};

class AuthenticateInput
{
    public function __construct(
        public readonly AuthUsername $username,
        public readonly AuthPassword $password
    ) {}

    public static function fromPrimitives(
        string $username,
        string $password
    ): self {
        return new self(
            new AuthUsername($username),
            new AuthPassword($password)
        );
    }
}
