<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Fitpal\User\Domain\UserRole;
use Illuminate\Database\Seeder;

use Fitpal\User\Application\{
    DTO\CreateUserInput,
    CreateUser
};

class UserSeeder extends Seeder
{
    public function __construct(private CreateUser $createUser) {}

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createUser->__invoke(
            CreateUserInput::fromPrimitives(
                name: 'Administrator',
                email: 'admin@fitpal.com',
                password: 'password',
                role: UserRole::ADMIN->value
            )
        );

        foreach (UserFactory::times(10)->raw() as $data) {
            $this->createUser->__invoke(
                CreateUserInput::fromPrimitives(
                    name: $data['name'],
                    email: $data['email'],
                    password: $data['password'],
                    role: UserRole::TEACHER->value
                )
            );
        }
    }
}
