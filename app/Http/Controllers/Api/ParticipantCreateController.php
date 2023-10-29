<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ParticipantCreateRequest;
use App\Models\Participant;


class ParticipantCreateController extends Controller
{
    public function __invoke(ParticipantCreateRequest $request)
    {
        $data = $request->validated();

        $user = Participant::updateOrCreate($data);

        return response([
            'message' => 'Новый участник создан.',
            'data' => $user,
        ], 201);
    }
}
