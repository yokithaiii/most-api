<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestLevel extends Model
{
    use HasFactory;

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
