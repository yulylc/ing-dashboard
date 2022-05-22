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
            $table->string('password');
            $table->text('resumen')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('cv')->nullable();
           // $table->unsignedBigInteger('estado_id')->nullable();
            //$table->string('escolaridad')->nullable();
            //$table->unsignedBigInteger('grado_id'); 
            
           // $table->string('direccion'); //revisar
            
            //$table->foreign('grado_id')->references('id')->on('grados')->onDelete('set null');
            //  $table->foreign('estado_id')
            //     ->references('id')
            //     ->on('estados')
            //     ->onDelete('cascade');
                
           // $table->enum('status', ['Pending', 'Wait', 'Active'])->default('Pending');
          //  $table->foreignId('estado_id')->constrained('estados');
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
