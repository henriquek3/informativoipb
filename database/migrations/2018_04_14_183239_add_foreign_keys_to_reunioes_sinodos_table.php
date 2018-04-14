<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToReunioesSinodosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reunioes_sinodos', function (Blueprint $table) {
            $table->foreign('id_sinodo', 'reunioes_sinodos_fk0')->references('id')->on('sinodos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_inclusao', 'reunioes_sinodos_fk1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_alteracao', 'reunioes_sinodos_fk2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reunioes_sinodos', function (Blueprint $table) {
            $table->dropForeign('reunioes_sinodos_fk0');
            $table->dropForeign('reunioes_sinodos_fk1');
            $table->dropForeign('reunioes_sinodos_fk2');
        });
    }

}
