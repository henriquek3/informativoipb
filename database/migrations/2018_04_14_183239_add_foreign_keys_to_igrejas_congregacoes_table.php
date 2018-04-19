<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToIgrejasCongregacoesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('igrejas_congregacoes', function (Blueprint $table) {
            $table->foreign('id_igreja', 'igrejas_congregacoes_fk0')->references('id')->on('igrejas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_estado', 'igrejas_congregacoes_fk1')->references('id')->on('estados')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_cidade', 'igrejas_congregacoes_fk2')->references('id')->on('cidades')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('igrejas_congregacoes', function (Blueprint $table) {
            $table->dropForeign('igrejas_congregacoes_fk0');
            $table->dropForeign('igrejas_congregacoes_fk1');
            $table->dropForeign('igrejas_congregacoes_fk2');
        });
    }

}
