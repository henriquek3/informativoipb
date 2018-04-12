<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEstadosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estados', function (Blueprint $table) {
            $table->foreign('id_pais', 'estados_fk0')->references('id')->on('paises')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_pais', 'estados_fk1')->references('id')->on('paises')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estados', function (Blueprint $table) {
            $table->dropForeign('estados_fk0');
            $table->dropForeign('estados_fk1');
        });
    }

}
