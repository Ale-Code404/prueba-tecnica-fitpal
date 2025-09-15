<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Dedoc\Scramble\Attributes\Group;

use Fitpal\Auth\Application\{
    DTO\AuthenticateInput,
    AuthenticateUser
};
use Fitpal\Auth\Domain\Errors\{
    InvalidAuthCredentials,
    InvalidAuthUsername
};

class LoginController extends Controller
{
    /**
     * Authenticate user
     * 
     * Authenticate user and return an JWT access token 
     */
    #[Group('Auth')]
    public function __invoke(LoginRequest $request, AuthenticateUser $authenticateUser)
    {
        try {
            $token = $authenticateUser(
                AuthenticateInput::fromPrimitives(
                    $request->email,
                    $request->password
                )
            );
        } catch (InvalidAuthCredentials | InvalidAuthUsername) {
            abort(401, 'The provided credentials are incorrect.');
        }

        return response()->json([
            'access_token' => $token->value()
        ]);
    }
}
