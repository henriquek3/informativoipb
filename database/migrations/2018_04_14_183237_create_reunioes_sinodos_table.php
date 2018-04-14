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
            $table->string('data_reuniao', 10)->nullable();
            $table->string('ano', 10)->nullable();
            $table->integer('status')->nullable();
            $table->integer('usuario_inclusao')->index('reunioes_sinodos_fk1');
            $table->integer('usuario_alteracao')->nullable()->index('reunioes_sinodos_fk2');
            $table->softDeletes();
            $table->timestamps();
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
