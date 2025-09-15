<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Dedoc\Scramble\Attributes\Group;
use Fitpal\User\Domain\Errors\UserAlreadyExists;
use Illuminate\Validation\ValidationException;

use Fitpal\Auth\Application\{
    DTO\RegisterUserInput,
    RegisterUser
};

class RegisterController extends Controller
{
    /**
     * Register new user.
     * 
     * Register a new user and return an authentication token.
     * 
     */
    #[Group('Auth')]
    public function __invoke(RegisterRequest $request, RegisterUser $registerUser)
    {
        try {
            $registerUser(
                RegisterUserInput::fromPrimitives(
                    name: $request->get('name'),
                    email: $request->get('email'),
                    password: $request->get('password')
                )
            );
        } catch (UserAlreadyExists) {
            throw ValidationException::withMessages([
                'email' => ['The email has already been taken.'],
            ]);
        }

        return response()->json(null, 204);
    }
}
