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
            $table->id();
            $table->string("cin", 25)->nullable();
            $table->string("nom", 25);
            $table->string("email", 25);
            $table->String("age")->nullable();
            $table->string("tel", 25);
            $table->string("mot_de_pass", 225);
            $table->string("sexe", 25)->nullable();
            $table->string("image", 225)->default('user.png');
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
