<?php

namespace Fitpal\Auth\Domain;

class AuthUser
{
    public function __construct(
        private AuthUsername $username,
        private AuthPassword $password
    ) {}

    public static function fromPrimitives(string $email, string $password): self
    {
        return new self(
            new AuthUsername($email),
            new AuthPassword($password)
        );
    }

    public function username(): AuthUsername
    {
        return $this->username;
    }

    public function password(): AuthPassword
    {
        return $this->password;
    }
}
