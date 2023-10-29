<?php

namespace Database\Factories;

use App\Models\ContestLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContestLevel>
 */
class ContestLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contest_start_date' => now(),
            'contest_end_date' => now()->addDay(),
        ];
    }

    public function secondContestLevel()
    {
        return $this->state(function (array $attributes) {
            return [
                'contest_start_date' => now()->addDay(),
                'contest_end_date' => now()->addDays(2),
            ];
        });
    }

}
