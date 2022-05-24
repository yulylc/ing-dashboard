<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            //permisos para la tabla roles
            'Pendiente',
            'Aceptado',
            'Denegado',
        ];
        foreach($estados as $estado){
            Estado::create(['name'=>$estado]);
        }
    }
}
