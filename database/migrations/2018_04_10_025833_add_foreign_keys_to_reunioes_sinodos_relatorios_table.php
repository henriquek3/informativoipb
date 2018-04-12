<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToReunioesSinodosRelatoriosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reunioes_sinodos_relatorios', function (Blueprint $table) {
            $table->foreign('id_reuniao_sinodo', 'reunioes_sinodos_relatorios_fk0')->references('id')->on('reunioes_sinodos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_reuniao_presbiterio', 'reunioes_sinodos_relatorios_fk1')->references('id')->on('reunioes_presbiterios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reunioes_sinodos_relatorios', function (Blueprint $table) {
            $table->dropForeign('reunioes_sinodos_relatorios_fk0');
            $table->dropForeign('reunioes_sinodos_relatorios_fk1');
        });
    }

}
