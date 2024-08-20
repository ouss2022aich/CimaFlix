<?php

namespace Database\Seeders;

use App\Models\Storyline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorylineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Storyline::factory()->count(30)->create();
    }
}
