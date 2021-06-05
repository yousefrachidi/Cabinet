<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->string("cin", 25)->primary();
            $table->string("nom" ,25);
            $table->string("prenom" ,25);
            $table->string("email" , 25);
            $table->dateTime("date_de_naissance");
            $table->string("tel" ,25);
            $table->string("mot_de_pass" , 225);
            $table->string("sexe" , 25);
            $table->string("image" ,225);
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
        Schema::dropIfExists('patients');
    }
}
