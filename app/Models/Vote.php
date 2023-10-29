<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_id',
        'user_id',
        'contest_level_id',
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
