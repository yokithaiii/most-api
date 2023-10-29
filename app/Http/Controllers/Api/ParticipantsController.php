<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ParticipantsResource;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function __invoke(Request $request)
    {
        $sortBy = $request->input('sort_by');
        $order = $request->input('order');

        $participants = Participant::all();

        if ($sortBy === 'votes_count') {
            $participants = $participants->sortByDesc(function ($participant) {
                return $participant->votes->count();
            });
        }

        if ($sortBy === 'name') {
            $participants = $participants->sortBy('name');
        }

        if ($order === 'asc') {
            $participants = $participants->reverse();
        }

        return ParticipantsResource::collection($participants);
    }
}
