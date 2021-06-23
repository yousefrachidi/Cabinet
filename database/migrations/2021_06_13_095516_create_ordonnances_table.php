<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdonnancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnances', function (Blueprint $table) {
            $table->id("id_ordonnance");
            //$table->string("cin_patient", 25);
            $table->unsignedBigInteger('id_patient');
            $table->unsignedInteger("age");
            $table->unsignedBigInteger('id_admin');
            $table->string('description', 50);
            $table->timestamps();

            $table->foreign('id_admin')
                  ->references('id')
                  ->on('admins')
                  ->onDelete('cascade');
 
            $table->foreign('id_patient')
                  ->references('id')
                  ->on('patients')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
                  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordonnances');
    }
}
