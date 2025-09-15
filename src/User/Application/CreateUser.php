<?php

namespace Fitpal\User\Application;

use Fitpal\User\Application\DTO\CreateUserInput;

use Fitpal\User\Domain\{
    Errors\UserAlreadyExists,
    User,
    UserId,
    UserRepository
};

class CreateUser
{
    public function __construct(private UserRepository $userRepository) {}

    public function __invoke(CreateUserInput $input)
    {
        $existing = $this->userRepository->findByEmail($input->email);

        if ($existing) {
            throw new UserAlreadyExists($input->email);
        }

        $user = new User(
            id: new UserId(UserId::generate()),
            name: $input->name,
            email: $input->email,
            password: $input->password,
            role: $input->role
        );

        $this->userRepository->save($user);
    }
}
