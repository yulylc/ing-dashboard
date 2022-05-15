<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $candidatos = Candidate::factory(50)->create();
        
        foreach ($candidatos as $candidato){
            $candidato->technologies()->attach([
                rand(1,10),
                rand(11,20),
            ]);
        }
       
    }
}
