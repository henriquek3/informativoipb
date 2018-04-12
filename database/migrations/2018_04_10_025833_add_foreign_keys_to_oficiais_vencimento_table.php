<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOficiaisVencimentoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oficiais_vencimento', function (Blueprint $table) {
            $table->foreign('id_presbitero', 'oficiais_vencimento_fk0')->references('id')->on('presbiteros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_relatorio_conselho', 'oficiais_vencimento_fk1')->references('id')->on('relatorios_conselhos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oficiais_vencimento', function (Blueprint $table) {
            $table->dropForeign('oficiais_vencimento_fk0');
            $table->dropForeign('oficiais_vencimento_fk1');
        });
    }

}
