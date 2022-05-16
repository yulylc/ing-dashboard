<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Candidate;

class CandidateFactory extends Factory
{
    
    protected $model = Candidate::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(15),
            'apellidos'=> $this->faker->lastName(40),
            //'ci' => $this->faker->(11),
            'email' => $this->faker->unique()->email(),
            'resumen' => $this->faker->text(250),
            
            
            //'fechadesolicitud' => $this->faker->date(),

        ];
    }
}
