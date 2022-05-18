<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('apellidos');
            $table->string('ci', 11)->nullable();
            $table->string('email')->unique();
            $table->text('resumen')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('escolaridad')->nullable();
           // $table->string('direccion'); //revisar
            
            //como subo el curriculum? buscar file upload en bibliografia de laravel
            $table->string('cv')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
