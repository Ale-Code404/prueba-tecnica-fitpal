<?php

namespace Fitpal\User\Infra\Persistence;

use App\Models\User as EloquentUserModel;

use Fitpal\User\Domain\{
    User,
    UserEmail,
    UserId,
    UserRepository
};

class EloquentUserRepository implements UserRepository
{
    public function findById(UserId $id): ?User
    {
        $model = EloquentUserModel::query()->find($id->value());

        if (!$model) {
            return null;
        }

        return $this->toEntity($model);
    }

    public function findByEmail(UserEmail $email): ?User
    {
        $model = EloquentUserModel::query()->where('email', $email->value())->first();

        if (!$model) {
            return null;
        }

        return $this->toEntity($model);
    }

    public function save(User $user): void
    {
        EloquentUserModel::query()->create($user->toPrimitives());
    }

    public function toEntity(EloquentUserModel $model): User
    {
        return User::fromPrimitives(
            $model->id,
            $model->name,
            $model->email,
            $model->role,
            $model->password
        );
    }
}
