<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRelatoriosEstatisticasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relatorios_estatisticas', function (Blueprint $table) {
            $table->foreign('id_igreja', 'relatorios_estatisticas_fk0')->references('id')->on('igrejas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_presbitero_conselho', 'relatorios_estatisticas_fk1')->references('id')->on('presbiteros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_inclusao', 'relatorios_estatisticas_fk2')->references('id')->on('usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_ultima_alteracao', 'relatorios_estatisticas_fk3')->references('id')->on('usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relatorios_estatisticas', function (Blueprint $table) {
            $table->dropForeign('relatorios_estatisticas_fk0');
            $table->dropForeign('relatorios_estatisticas_fk1');
            $table->dropForeign('relatorios_estatisticas_fk2');
            $table->dropForeign('relatorios_estatisticas_fk3');
        });
    }

}
