<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Spatie
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $permisos = [
             //permisos para la tabla roles
             'Mostrar rol',
             'Crear rol',
             'Editar rol',
             'Borrar rol',                
         ];
    
         foreach($permisos as $permiso){
             Permission::create(['name'=>$permiso]);
         }
    }
}
