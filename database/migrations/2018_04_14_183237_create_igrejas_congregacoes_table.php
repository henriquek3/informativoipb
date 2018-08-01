<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIgrejasCongregacoesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('igrejas_congregacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_igreja');
            $table->foreign('id_igreja')->references('id')->on('igrejas');
            $table->unsignedInteger('id_estado');
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->unsignedInteger('id_cidade');
            $table->foreign('id_cidade')->references('id')->on('cidades');
            $table->string('nome')->nullable();
            $table->string('cnpj', 20)->nullable();
            $table->string('endereco');
            $table->string('endereco_numero', 10)->nullable();
            $table->string('endereco_complemento')->nullable();
            $table->string('endereco_bairro');
            $table->string('endereco_cep', 20)->nullable();
            $table->string('endereco_cx_postal', 20)->nullable();
            $table->string('data_organizacao', 10)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('email', 75)->nullable();
            $table->string('website')->nullable();
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
        Schema::drop('igrejas_congregacoes');
    }

}
