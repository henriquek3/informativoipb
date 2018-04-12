<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOficiaisVencimentoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficiais_vencimento', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_presbitero')->index('oficiais_vencimento_fk0');
            $table->integer('id_relatorio_conselho')->index('oficiais_vencimento_fk1');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('oficiais_vencimento');
    }

}
