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
            $table->string('ano', 10)->nullable();
            $table->date('data_reuniao');
            $table->integer('id_presbiterio');
            $table->unsignedInteger('id_estado');
            $table->unsignedInteger('id_cidade');
            $table->string('local');
            $table->longText('observacoes');
            $table->integer('status')->nullable(); // re a reuniao foi finalizada
            $table->integer('importado')->nullable(); // SE foi importado pela reuniao do sinodo
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('reunioes_presbiterios');
    }

}
