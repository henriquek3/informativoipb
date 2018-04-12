<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReunioesSinodosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunioes_sinodos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_sinodo')->index('reunioes_sinodos_fk0');
            $table->string('data_reuniao', 10);
            $table->integer('id_local_reuniao');
            $table->string('ano', 10);
            $table->integer('status');
            $table->integer('usuario_inclusao')->index('reunioes_sinodos_fk1');
            $table->string('data_inclusao', 10);
            $table->integer('usuario_alteracao')->nullable()->index('reunioes_sinodos_fk2');
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
        Schema::drop('reunioes_sinodos');
    }

}
