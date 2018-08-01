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
            $table->integer('id_reuniao_sinodo');
            $table->integer('id_reuniao_presbiterio');
            $table->integer('id_relatorio_conselho');
            $table->integer('id_relatorio_estatistica');
            $table->integer('id_relatorio_ministro');
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
