<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'avatar',
        'contest_level_id'
    ];

    public function contestLevel()
    {
        return $this->belongsTo(ContestLevel::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

}
