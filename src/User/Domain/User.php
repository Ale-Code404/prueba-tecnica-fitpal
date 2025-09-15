<?php

namespace Fitpal\User\Domain;

use Fitpal\User\Domain\UserRole;

class User
{
    public function __construct(
        private UserId $id,
        private UserName $name,
        private UserEmail $email,
        private UserRole $role,
        private UserPassword $password
    ) {}

    public static function fromPrimitives(
        string $id,
        string $name,
        string $email,
        string $role,
        string $password
    ): self {
        return new self(
            new UserId($id),
            new UserName($name),
            new UserEmail($email),
            UserRole::from($role),
            new UserPassword($password)
        );
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function role(): UserRole
    {
        return $this->role;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id->value(),
            'name' => $this->name->value(),
            'email' => $this->email->value(),
            'role' => $this->role->value,
            'password' => $this->password->value(),
        ];
    }
}
