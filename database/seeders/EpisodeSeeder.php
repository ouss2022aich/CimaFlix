<?php

namespace Database\Seeders;

use App\Models\Episode;
use Illuminate\Database\Seeder;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i=0 ; $i < 20 ; $i++ ) { 
          
            Episode::factory()->count(1)->create();
        }
    }
}
