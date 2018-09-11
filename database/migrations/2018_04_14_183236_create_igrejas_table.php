<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIgrejasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('igrejas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_presbiterio');
            $table->foreign('id_presbiterio')->references('id')->on('presbiterios');
            $table->unsignedInteger('id_sinodo');
            $table->foreign('id_sinodo')->references('id')->on('sinodos');
            $table->unsignedInteger('id_igreja')->nullable()->comments('Usado em caso de ser uma congregação');
            $table->unsignedInteger('id_estado');
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->unsignedInteger('id_cidade');
            $table->foreign('id_cidade')->references('id')->on('cidades');
            $table->unsignedInteger('congregacao')->nullable()->comments('1-Sinodo, 2-Presbiterio');
            $table->string('cnpj', 20)->unique('cnpj');
            $table->string('nome');
            $table->string('data_organizacao', 10)->nullable();
            $table->string('endereco');
            $table->string('endereco_numero', 10)->nullable();
            $table->string('endereco_complemento')->nullable();
            $table->string('endereco_bairro')->nullable();
            $table->string('endereco_cep', 20)->nullable();
            $table->string('endereco_cx_postal', 20)->nullable();
            $table->string('endereco_cx_postal_cep', 20)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('email')->nullable();
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
        Schema::drop('igrejas');
    }

}
