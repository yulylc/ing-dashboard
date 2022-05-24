<?php

namespace Database\Seeders;

use App\Models\Grado;
use Illuminate\Database\Seeder;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grados = [
            //permisos para la tabla roles
           
            'Técnico',
            'Bachiller',
            'Superior',
        ];
        foreach($grados as $grado){
            Grado::create(['name'=>$grado]);
        }
    }
}
