<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToIgrejasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('igrejas', function (Blueprint $table) {
            $table->foreign('id_presbiterio', 'igrejas_fk0')->references('id')->on('presbiterios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_sinodo', 'igrejas_fk1')->references('id')->on('sinodos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('igrejas', function (Blueprint $table) {
            $table->dropForeign('igrejas_fk0');
            $table->dropForeign('igrejas_fk1');
        });
    }

}
