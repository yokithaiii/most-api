<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UsersResource;
use App\Models\User;

class UsersController extends Controller
{
    public function __invoke()
    {
        $users = UsersResource::collection(User::all());

        return response()->json([
            'data' => $users
        ], 200);
    }
}
