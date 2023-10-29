<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserLoginRequest;
use Illuminate\Validation\ValidationException;

class UserLoginController extends Controller
{
    public function __invoke(UserLoginRequest $request)
    {
        $data = $request->validated();

        if (auth()->attempt($data)) {
            $user = auth()->user();
            $token = $user->createToken('api_token')->plainTextToken;
            return response()->json([
                'message' => 'Вы успешно авторизовались!',
                'token' => $token,
                'token_type' => 'Bearer'
            ], 200);
        } else {
            throw ValidationException::withMessages(['error' => 'Invalid credentials']);
        }
    }
}
