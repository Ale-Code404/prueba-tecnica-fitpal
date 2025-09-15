<?php

namespace Fitpal\Auth\Application;

use Fitpal\Auth\Application\DTO\RegisterUserInput;
use Fitpal\User\Domain\UserRole;

use Fitpal\User\Application\{
    DTO\CreateUserInput,
    CreateUser
};

class RegisterUser
{
    public function __construct(private CreateUser $createUser) {}

    public function __invoke(RegisterUserInput $input)
    {
        $this->createUser->__invoke(
            CreateUserInput::fromPrimitives(
                name: $input->name->value(),
                email: $input->email->value(),
                password: $input->password->value(),
                role: UserRole::STUDENT->value
            )
        );
    }
}
