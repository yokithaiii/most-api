<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserCreateRequest;
use App\Models\User;

class UserCreateController extends Controller
{
    public function __invoke(UserCreateRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        return response()->json([
            'message' => 'Новый пользователь создан.',
            'data' => $user
        ], 201);
    }
}
