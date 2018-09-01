<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresbiterosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presbiteros', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_sinodo');
            $table->foreign('id_sinodo')->references('id')->on('sinodos');
            $table->unsignedInteger('id_presbiterio');
            $table->foreign('id_presbiterio')->references('id')->on('presbiterios');
            $table->unsignedInteger('id_igreja');
            $table->foreign('id_igreja')->references('id')->on('igrejas');
            $table->string('nome');
            $table->integer('pastor_titular')->nullable();
            $table->string('nome_mae')->nullable();
            $table->string('nome_pai')->nullable();
            $table->string('nascimento_data', 10)->nullable();
            $table->unsignedInteger('nascimento_id_cidade')->nullable();
            $table->unsignedInteger('nascimento_id_estado')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('rg', 20)->nullable();
            $table->string('rg_emissor', 20)->nullable();
            $table->string('cpf', 20)->nullable();
            $table->integer('estado_civil')->nullable();
            $table->string('conjuge_nome')->nullable();
            $table->string('conjuge_nascimento', 10)->nullable();
            $table->text('nome_filhos')->nullable();
            $table->string('endereco')->nullable();
            $table->string('endereco_nr', 10)->nullable();
            $table->string('endereco_complemento')->nullable();
            $table->string('endereco_bairro')->nullable();
            $table->integer('endereco_id_estado')->nullable();
            $table->integer('endereco_id_cidade')->nullable();
            $table->string('cep', 20)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('celular', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('cx_postal', 20)->nullable();
            $table->string('cx_postal_cep', 20)->nullable();
            $table->string('ordenacao_data', 10)->nullable();
            $table->integer('ordenacao_presbiterio')->nullable();
            $table->string('ativo', 1)->nullable();
            $table->integer('tipo')->nullable();
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
        Schema::drop('presbiteros');
    }

}
