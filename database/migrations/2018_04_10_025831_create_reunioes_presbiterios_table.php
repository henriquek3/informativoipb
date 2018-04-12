<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReunioesPresbiteriosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunioes_presbiterios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_presbiterio')->index('reunioes_presbiterios_fk0');
            $table->string('data_reuniao', 10);
            $table->integer('id_local_reuniao');
            $table->string('ano', 10);
            $table->integer('status');
            $table->integer('usuario_inclusao')->index('reunioes_presbiterios_fk1');
            $table->integer('data_inclusao')->index('reunioes_presbiterios_fk2');
            $table->string('data_alteracao', 10)->nullable();
            $table->integer('usuario_alteracao')->nullable()->index('reunioes_presbiterios_fk3');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reunioes_presbiterios');
    }

}
