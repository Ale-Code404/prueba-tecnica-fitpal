<?php

namespace Fitpal\Auth\Infra\Persistence;

use App\Models\User as EloquentUserModel;
use Fitpal\User\Domain\User;
use Illuminate\Support\Facades\Auth;

use Fitpal\Auth\Domain\{
    AuthManager,
    AuthPassword,
    AuthToken,
    AuthUser,
    AuthUsername
};

class PassportAuthManager implements AuthManager
{
    public function getCurrentUser(): ?User
    {
        /** @var EloquentUserModel|null $user */
        $user = Auth::user();

        if (!$user) {
            return null;
        }

        return User::fromPrimitives(
            $user->id,
            $user->name,
            $user->email,
            $user->role,
            $user->password,
        );
    }

    public function search(AuthUsername $username): ?AuthUser
    {
        $user = EloquentUserModel::query()
            ->where('email', $username->value())
            ->first();

        if (!$user) {
            return null;
        }

        return AuthUser::fromPrimitives(
            $user->email,
            $user->password,
        );
    }

    public function authenticate(AuthUser $user, AuthPassword $password): ?AuthToken
    {
        $credentials = [
            'email' => $user->username()->value(),
            'password' => $password->value(),
        ];

        if (!Auth::attempt($credentials)) {
            return null;
        }

        /** @var EloquentUserModel $model */
        $model = Auth::user();

        return new AuthToken(
            $model->createToken('access_token')->accessToken
        );
    }
}
