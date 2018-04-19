<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRelatoriosConselhosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relatorios_conselhos', function (Blueprint $table) {
            $table->foreign('id_igreja', 'relatorios_conselhos_fk0')->references('id')->on('igrejas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('sa_id_oficiais_vencimento', 'relatorios_conselhos_fk1')->references('id')->on('oficiais_vencimentos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relatorios_conselhos', function (Blueprint $table) {
            $table->dropForeign('relatorios_conselhos_fk0');
            $table->dropForeign('relatorios_conselhos_fk1');
        });
    }

}
