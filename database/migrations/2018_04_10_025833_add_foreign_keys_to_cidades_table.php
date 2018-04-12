<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCidadesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cidades', function (Blueprint $table) {
            $table->foreign('id_estado', 'cidades_fk0')->references('id')->on('estados')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_estado', 'cidades_fk1')->references('id')->on('estados')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cidades', function (Blueprint $table) {
            $table->dropForeign('cidades_fk0');
            $table->dropForeign('cidades_fk1');
        });
    }

}
