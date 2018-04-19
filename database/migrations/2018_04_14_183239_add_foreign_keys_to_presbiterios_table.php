<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPresbiteriosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presbiterios', function (Blueprint $table) {
            $table->foreign('id_sinodo', 'presbiterios_fk0')->references('id')->on('sinodos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presbiterios', function (Blueprint $table) {
            $table->dropForeign('presbiterios_fk0');
        });
    }

}
