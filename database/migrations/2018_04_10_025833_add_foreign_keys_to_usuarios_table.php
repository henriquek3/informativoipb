<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsuariosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('id_presbitero', 'usuarios_fk0')->references('id')->on('presbiteros')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_inclusao', 'usuarios_fk1')->references('id')->on('usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('usuario_alteracao', 'usuarios_fk2')->references('id')->on('usuarios')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('usuarios_fk0');
            $table->dropForeign('usuarios_fk1');
            $table->dropForeign('usuarios_fk2');
        });
    }

}
