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
            $table->integer('id', true);
            $table->integer('id_igreja')->index('presbiteros_fk0');
            $table->string('nome');
            $table->string('nome_mae')->nullable();
            $table->string('nome_pai')->nullable();
            $table->string('nascimento_data', 10)->nullable();
            $table->integer('nascimento_id_cidade')->nullable()->index('presbiteros_fk1');
            $table->integer('nacionalidade')->index('presbiteros_fk2');
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
            $table->integer('endereco_id_cidade')->nullable()->index('presbiteros_fk3');
            $table->string('cep', 20)->nullable();
            $table->string('telefone', 20)->nullable();
            $table->string('celular', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('cx_postal', 20)->nullable();
            $table->string('cx_postal_cep', 20)->nullable();
            $table->string('ordenacao_data', 10)->nullable();
            $table->integer('ordenacao_presbiterio')->nullable()->index('presbiteros_fk4');
            $table->string('ativo', 1)->nullable();
            $table->integer('tipo');
            $table->integer('usuario_inclusao')->index('presbiteros_fk5');
            $table->string('data_inclusao', 10);
            $table->integer('usuario_alteracao')->nullable()->index('presbiteros_fk6');
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
        Schema::drop('presbiteros');
    }

}
