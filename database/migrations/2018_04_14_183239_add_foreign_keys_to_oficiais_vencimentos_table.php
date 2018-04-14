<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOficiaisVencimentosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oficiais_vencimentos', function (Blueprint $table) {
            $table->foreign('id_presbitero', 'oficiais_vencimentos_fk0')->references('id')->on('presbiteros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_relatorio_conselho', 'oficiais_vencimentos_fk1')->references('id')->on('relatorios_conselhos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oficiais_vencimentos', function (Blueprint $table) {
            $table->dropForeign('oficiais_vencimentos_fk0');
            $table->dropForeign('oficiais_vencimentos_fk1');
        });
    }

}
