<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParticipantsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'avatar' => $this->avatar,
            'contest_level_id' => $this->contest_level_id,
            'votes_count' => $this->votes->count(),
            'votes' => $this->votes
        ];
    }
}
