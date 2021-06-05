<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsRecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rendez_vous', function (Blueprint $table) {
            //
             $table->bigInteger('id_reception')->unsigned()->after('id_rendez_vous');

             $table->foreign('id_reception')->references('id_reception')->on('receptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rendez_vous', function (Blueprint $table) {
            //
            $table->dropForeign(['id_reception']);
            $table->dropColumn('id_reception');
        });
    }
}
