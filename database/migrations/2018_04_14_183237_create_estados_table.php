<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEstadosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_pais')->index('estados_fk0');
            $table->string('uf_codigo', 2);
            $table->string('nome');
            $table->string('uf_nome', 2);
            $table->string('regiao', 100);
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
        Schema::drop('estados');
    }

}
