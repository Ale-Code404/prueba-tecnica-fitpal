<?php

namespace Fitpal\Auth\Application;

use Fitpal\User\Domain\User;

use Fitpal\Auth\Domain\{
    Errors\UnauthenticatedUser,
    AuthManager
};

class GetCurrentUser
{
    public function __construct(private AuthManager $authManager) {}

    public function __invoke(): User
    {
        $user = $this->authManager->getCurrentUser();

        if (!$user) {
            throw new UnauthenticatedUser();
        }

        return $user;
    }
}
