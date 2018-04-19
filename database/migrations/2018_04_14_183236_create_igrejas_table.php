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
            $table->integer('id', true);
            $table->integer('id_presbiterio')->index('igrejas_fk0');
            $table->integer('id_sinodo')->index('igrejas_fk1');
            $table->integer('id_estado');
            $table->integer('id_cidade');
            $table->integer('congregacao_presbiterio')->nullable();
            $table->string('cnpj', 20)->unique('cnpj');
            $table->string('nome');
            $table->string('data_organizacao', 10)->nullable();
            $table->string('endereco');
            $table->string('endereco_numero', 10)->nullable();
            $table->string('endereco_complemento')->nullable();
            $table->string('endereco_bairro')->nullable();
            $table->string('endereco_cep', 20)->nullable();
            $table->string('endereco_cx_postal', 20)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->integer('user_id');
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
