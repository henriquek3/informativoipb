<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCidadesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_estado')->index('cidades_fk0');
            $table->integer('cidade_codigo');
            $table->integer('municipio_codigo');
            $table->string('nome');
            $table->string('uf_estado', 2);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cidades');
    }

}
