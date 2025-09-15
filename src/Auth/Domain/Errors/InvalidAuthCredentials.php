<?php

namespace Fitpal\Auth\Domain\Errors;

use Fitpal\Shared\Domain\DomainError;

class InvalidAuthCredentials extends DomainError
{
    public function code(): string
    {
        return 'auth.invalid_credentials';
    }
}
