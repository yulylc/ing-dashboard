<?php

use App\Models\Technology;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateTechnologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_technology', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('technology_id');

            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');

            $table->string('experiencia')->nullable(); //de momento nullable

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
        Schema::dropIfExists('candidate_technology');
    }
}
