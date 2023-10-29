<?php

namespace App\Actions;

use App\Models\ContestLevel;
use App\Models\Vote;


class VoteAction
{
    public function vote($data)
    {
        $userId = auth()->id();
        $contestLevel = ContestLevel::where('contest_start_date', '<=', now())
            ->where('contest_end_date', '>=', now())
            ->first();

        if (!$contestLevel) {
            return response()->json([
                'message' => 'Голосование закрыто.',
            ], 400);
        }

        $contestLevelId = $contestLevel->id;

        if ($contestLevel->id === 1) {
            $existingVote = Vote::where('user_id', $userId)
                ->where('contest_level_id', $contestLevelId)
                ->first();

            if ($existingVote) {
                return response()->json([
                    'message' => 'В первом этапе можно голосовать только один раз!',
                ], 400);
            }
        }

        if ($contestLevel->id === 2) {
            $existingVotesCount = Vote::where('user_id', $userId)
                ->where('contest_level_id', $contestLevelId)
                ->distinct('participant_id')
                ->count();

            if ($existingVotesCount >= 3) {
                return response()->json([
                    'message' => 'Вы исчерпали лимит голосов во втором этапе.',
                ], 400);
            }

            $hasVotedForParticipant = Vote::where('user_id', $userId)
                ->where('contest_level_id', $contestLevelId)
                ->where('participant_id', $data['participant_id'])
                ->exists();

            if ($hasVotedForParticipant) {
                return response()->json([
                    'message' => 'Вы уже проголосовали за этого участника.',
                ], 400);
            }
        }

        $vote = Vote::create([
            'participant_id' => $data['participant_id'],
            'user_id' => $userId,
            'contest_level_id' => $contestLevelId,
        ]);

        return response()->json([
            'message' => 'Ваш голос отправлен!',
            'data' => $vote,
        ], 200);
    }
}
