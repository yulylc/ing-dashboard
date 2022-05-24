<?php

namespace Database\Seeders;

use App\Models\Technology;
use App\Models\Estado;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        Technology::factory(30)->create();
        $this->call(CandidateSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(GradoSeeder::class);
       // Estado::factory(['Pendiente','Aceptado','Denegado'])->create();
    }
}