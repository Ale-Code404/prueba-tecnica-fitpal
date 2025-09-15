<?php

namespace Fitpal\Auth\Application;

use Fitpal\Auth\Application\DTO\AuthenticateInput;

use Fitpal\Auth\Domain\{
    Errors\InvalidAuthCredentials,
    Errors\InvalidAuthUsername,
    AuthManager
};

class AuthenticateUser
{
    public function __construct(private AuthManager $authManager) {}

    public function __invoke(AuthenticateInput $input)
    {
        $user = $this->authManager->search(
            $input->username
        );

        if (!$user) {
            throw new InvalidAuthUsername;
        }

        $token = $this->authManager->authenticate(
            $user,
            $input->password
        );

        if (!$token) {
            throw new InvalidAuthCredentials;
        }

        return $token;
    }
}
