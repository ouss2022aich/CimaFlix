<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Storyline>
 */
class StorylineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words( 3, true ),
            'description' => $this->faker->paragraph,
            'type' => $this->faker->randomElement([0,1]), // can be movie or serie 
            'release_date' => $this->faker->date,
            'trailer' => $this->faker->url,
            'rating' => $this->faker->numberBetween(1,10)
       ];
    }
}
