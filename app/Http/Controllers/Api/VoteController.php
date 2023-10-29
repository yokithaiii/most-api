<?php

namespace App\Http\Controllers\Api;

use App\Actions\VoteAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\VoteRequest;

class VoteController extends Controller
{
    public function __invoke(VoteRequest $request, VoteAction $voteAction)
    {
        $data = $request->validated();
        return $voteAction->vote($data);
    }
}
