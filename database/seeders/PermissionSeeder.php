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
             'Ver rol',
             'crear-rol',
             'editar-rol',
             'borrar-rol',
             //permisos para la tabla candidatos
             'Ver Solicitudes',
             'Crear Solicitud',
             'Editar Solicitud',
             'Eliminar Solicitud'
              //permisos para la tabla tecnologias
             
                             
         ];
    
         foreach($permisos as $permiso){
             Permission::create(['name'=>$permiso]);
         }
    }
}
