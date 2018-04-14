<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToReunioesPresbiteriosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reunioes_presbiterios', function (Blueprint $table) {
            $table->foreign('id_presbiterio', 'reunioes_presbiterios_fk0')->references('id')->on('presbiterios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_inclusao', 'reunioes_presbiterios_fk1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_alteracao', 'reunioes_presbiterios_fk2')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reunioes_presbiterios', function (Blueprint $table) {
            $table->dropForeign('reunioes_presbiterios_fk0');
            $table->dropForeign('reunioes_presbiterios_fk1');
            $table->dropForeign('reunioes_presbiterios_fk2');
        });
    }

}
