<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPresbiterosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presbiteros', function (Blueprint $table) {
            $table->foreign('id_igreja', 'presbiteros_fk0')->references('id')->on('igrejas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('nascimento_id_cidade', 'presbiteros_fk1')->references('id')->on('cidades')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('nacionalidade', 'presbiteros_fk2')->references('id')->on('paises')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('endereco_id_cidade', 'presbiteros_fk3')->references('id')->on('cidades')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('ordenacao_presbiterio', 'presbiteros_fk4')->references('id')->on('presbiterios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_inclusao', 'presbiteros_fk5')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_alteracao', 'presbiteros_fk6')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presbiteros', function (Blueprint $table) {
            $table->dropForeign('presbiteros_fk0');
            $table->dropForeign('presbiteros_fk1');
            $table->dropForeign('presbiteros_fk2');
            $table->dropForeign('presbiteros_fk3');
            $table->dropForeign('presbiteros_fk4');
            $table->dropForeign('presbiteros_fk5');
            $table->dropForeign('presbiteros_fk6');
        });
    }

}
