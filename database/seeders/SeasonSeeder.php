<?php

namespace Database\Seeders;
use App\Models\Season;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
          for ($i=0 ; $i < 40 ; $i++ ) { 
          
            Season::factory()->count(1)->create();
          }
       
     
    }
}
