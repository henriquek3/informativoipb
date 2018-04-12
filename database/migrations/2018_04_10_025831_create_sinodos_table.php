<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSinodosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinodos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome');
            $table->string('sigla', 10)->unique('sigla');
            $table->integer('regiao');
            $table->integer('usuario_inclusao')->index('sinodos_fk0');
            $table->string('data_inclusao', 10);
            $table->integer('usuario_alteracao')->nullable()->index('sinodos_fk1');
            $table->string('data_alteracao', 10)->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sinodos');
    }

}
