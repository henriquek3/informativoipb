<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSinodosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sinodos', function (Blueprint $table) {
            $table->foreign('usuario_inclusao', 'sinodos_fk0')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_alteracao', 'sinodos_fk1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sinodos', function (Blueprint $table) {
            $table->dropForeign('sinodos_fk0');
            $table->dropForeign('sinodos_fk1');
        });
    }

}
