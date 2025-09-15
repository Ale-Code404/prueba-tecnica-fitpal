<?php

namespace Fitpal\Auth\Domain\Errors;

use Fitpal\Shared\Domain\DomainError;

class UnauthenticatedUser extends DomainError
{
    public function code(): string
    {
        return 'auth.unauthenticated';
    }
}
