<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReunioesSinodosRelatoriosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunioes_sinodos_relatorios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_reuniao_sinodo')->index('reunioes_sinodos_relatorios_fk0');
            $table->integer('id_reuniao_presbiterio')->index('reunioes_sinodos_relatorios_fk1');
            $table->integer('id_relatorio_conselho')->index('reunioes_sinodos_relatorios_fk2');
            $table->integer('id_relatorio_estatistica')->index('reunioes_sinodos_relatorios_fk3');
            $table->integer('	id_relatorio_ministro')->index('reunioes_sinodos_relatorios_fk4');
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
        Schema::drop('reunioes_sinodos_relatorios');
    }

}
