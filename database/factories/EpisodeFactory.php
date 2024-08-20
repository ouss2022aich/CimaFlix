<?php

namespace Database\Factories;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $season = Season::inRandomOrder()->first();
        $number = Episode::where('season_id', $season->id)->max('number') + 1;

        return [
            'season_id' => $season->id,
            'title' => $this->faker->words(3, true),
            'number' => $number,
        ];
    }
}
