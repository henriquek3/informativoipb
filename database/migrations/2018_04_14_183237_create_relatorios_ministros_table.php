<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelatoriosMinistrosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios_ministros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('importado')->nullable();
            $table->unsignedInteger('id_presbitero');
            $table->foreign('id_presbitero')->references('id')->on('presbiteros');
            $table->string('ano', 4);

            $table->unsignedInteger('id_igreja');
            $table->foreign('id_igreja')->references('id')->on('igrejas');

            $table->integer('nr_dependentes')->nullable();
            $table->longText('nome_filhos')->nullable();
            $table->integer('condicao_moradia')->nullable();
            $table->string('data_ordenacao', 10)->nullable();
            $table->string('presbiterio_ordenacao')->nullable();
            $table->integer('dedicacao_ministerio')->nullable();
            $table->integer('ferias')->nullable();
            $table->string('congruas', 10)->nullable();
            $table->integer('previdencia_publica')->nullable();
            $table->integer('previdencia_privada')->nullable();
            $table->integer('plano_saude')->nullable();
            $table->integer('congruas_contribui_inss')->nullable();
            $table->string('previdencia_publica_valor', 10)->nullable();
            $table->integer('contribui_prev_privada')->nullable();

            $table->longText('campos_igrejas')->nullable();
            $table->longText('campos_congregacoes')->nullable();

            $table->integer('pregacoes')->nullable();
            $table->integer('ebd')->nullable();
            $table->integer('evangelizacao')->nullable();
            $table->integer('estudos_biblicos')->nullable();
            $table->integer('palestras_prelecoes')->nullable();
            $table->integer('msg_radio')->nullable();
            $table->integer('artigos_boletins_revistas')->nullable();
            $table->integer('entrevistas')->nullable();

            $table->integer('santa_ceia')->nullable();
            $table->integer('bencaos_nupciais')->nullable();
            $table->integer('funerais')->nullable();
            $table->integer('batismos')->nullable();
            $table->integer('profissoes_fe')->nullable();
            $table->integer('profissoes_batismos')->nullable();

            $table->integer('aconselhamentos')->nullable();
            $table->integer('visitas_evangelicos')->nullable();
            $table->integer('visitas_igrejas')->nullable();
            $table->integer('departamentos_internos')->nullable();

            $table->longText('descricao_atividades')->nullable();

            $table->integer('reunioes_conselho')->nullable();
            $table->integer('assembleias')->nullable();
            $table->integer('reunioes_presbiterio')->nullable();
            $table->integer('reunioes_sinodo')->nullable();
            $table->integer('diaconos_ordenados_investidos')->nullable();
            $table->integer('presbiteros_ordenados_investidos')->nullable();
            $table->integer('reunioes_concilio')->nullable();
            $table->longText('comentarios')->nullable();

            $table->longText('cargos_presbiterio')->nullable();
            $table->longText('cargos_sinodo')->nullable();
            $table->longText('cargos_concilio')->nullable();
            $table->longText('cargos_outros')->nullable();
            $table->longText('texto_complementar')->nullable();

            $table->longText('atualizacao_aperfeicoamento')->nullable();
            $table->longText('atividades_para_eclesiasticas')->nullable();
            $table->longText('atividades_extras_ministeriais')->nullable();
            $table->longText('atividades_outros')->nullable();

            $table->string('local')->nullable();
            $table->string('data', 10)->nullable();

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('status_relatorio')->nullable();
            $table->integer('tipo_relatorio')->default(2);
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
        Schema::drop('relatorios_ministros');
    }

}
