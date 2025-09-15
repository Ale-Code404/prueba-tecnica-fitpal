<?php

namespace Fitpal\Auth\Domain;

use Fitpal\User\Domain\User;

interface AuthManager
{
    public function getCurrentUser(): ?User;

    public function search(AuthUsername $username): ?AuthUser;

    public function authenticate(AuthUser $user, AuthPassword $password): ?AuthToken;
}
