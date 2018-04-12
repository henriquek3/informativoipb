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
