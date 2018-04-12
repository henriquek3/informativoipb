<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresbiteriosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presbiterios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_sinodo')->index('presbiterios_fk0');
            $table->string('nome');
            $table->string('sigla', 10);
            $table->integer('regiao');
            $table->integer('usuario_inclusao')->index('presbiterios_fk1');
            $table->string('data_inclusao', 10);
            $table->integer('usuario_alteracao')->nullable()->index('presbiterios_fk2');
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
        Schema::drop('presbiterios');
    }

}
