<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptions', function (Blueprint $table) {
            $table->id("id_reception");
            $table->string("nom" ,25);
            $table->string("prenom" ,25);
            $table->string("email" , 50)->unique();
            $table->string("mot_de_pass" , 225);
            $table->boolean("status")->default(true);
            $table->string("image" ,225)->nullable();
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
        Schema::dropIfExists('receptions');
    }
}
