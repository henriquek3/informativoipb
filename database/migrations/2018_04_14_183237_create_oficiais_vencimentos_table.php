<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOficiaisVencimentosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficiais_vencimentos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_presbitero')->index('oficiais_vencimentos_fk0');
            $table->integer('id_relatorio_conselho')->index('oficiais_vencimentos_fk1');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('oficiais_vencimentos');
    }

}
