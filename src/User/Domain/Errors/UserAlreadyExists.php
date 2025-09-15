<?php

namespace Fitpal\User\Domain\Errors;

use Fitpal\Shared\Domain\DomainError;
use Fitpal\User\Domain\UserEmail;

class UserAlreadyExists extends DomainError
{
    public function __construct(UserEmail $email)
    {
        parent::__construct("User with email {$email->value()} already exists.");
    }

    public function code(): string
    {
        return 'users.already_exists';
    }
}
