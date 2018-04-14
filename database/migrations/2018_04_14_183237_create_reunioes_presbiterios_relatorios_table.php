<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReunioesPresbiteriosRelatoriosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunioes_presbiterios_relatorios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_reuniao_presbiterio')->index('reunioes_presbiterios_relatorios_fk0');
            $table->integer('id_relatorio_conselho')->index('reunioes_presbiterios_relatorios_fk1');
            $table->integer('id_relatorio_estatistica')->index('reunioes_presbiterios_relatorios_fk2');
            $table->integer('id_relatorio_ministro')->index('reunioes_presbiterios_relatorios_fk3');
            $table->softDeletes();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reunioes_presbiterios_relatorios');
    }

}
