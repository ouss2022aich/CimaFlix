<?php

namespace Database\Factories;

use App\Models\Storyline;
use App\Models\Season;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Season>
 */
class SeasonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $storyline = Storyline::where('type', 1)->inRandomOrder()->first();
        $number = Season::where('storyline_id', $storyline->id)->max('number') + 1;

        return [
            'storyline_id' => $storyline->id,
            'title' => $this->faker->words(3, true),
            'number' => $number,
        ];
    }
}
