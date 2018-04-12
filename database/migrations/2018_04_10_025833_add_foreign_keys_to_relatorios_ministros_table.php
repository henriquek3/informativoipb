<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRelatoriosMinistrosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relatorios_ministros', function (Blueprint $table) {
            $table->foreign('id_presbitero', 'relatorios_ministros_fk0')->references('id')->on('presbiteros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_igrej', 'relatorios_ministros_fk1')->references('id')->on('igrejas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('dedicacao_ministerio', 'relatorios_ministros_fk2')->references('id')->on('presbiteros_campos')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_inclusao', 'relatorios_ministros_fk3')->references('id')->on('usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_alteracao', 'relatorios_ministros_fk4')->references('id')->on('usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relatorios_ministros', function (Blueprint $table) {
            $table->dropForeign('relatorios_ministros_fk0');
            $table->dropForeign('relatorios_ministros_fk1');
            $table->dropForeign('relatorios_ministros_fk2');
            $table->dropForeign('relatorios_ministros_fk3');
            $table->dropForeign('relatorios_ministros_fk4');
        });
    }

}
