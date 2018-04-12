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
            $table->integer('id', true);
            $table->integer('id_presbitero')->index('relatorios_ministros_fk0');
            $table->string('ano', 10);
            $table->integer('id_igrej')->index('relatorios_ministros_fk1');
            $table->integer('nr_dependentes')->nullable();
            $table->integer('condicao_moradia')->nullable();
            $table->integer('ferias')->nullable();
            $table->string('congruas', 10)->nullable();
            $table->integer('previdencia_publica')->nullable();
            $table->integer('previdencia_privada')->nullable();
            $table->integer('plano_saude')->nullable();
            $table->integer('congruas_contribui_inss')->nullable();
            $table->integer('previdencia_publica_valor')->nullable();
            $table->integer('contribui_prev_privada')->nullable();
            $table->integer('dedicacao_ministerio')->nullable()->index('relatorios_ministros_fk2');
            $table->integer('pregacoes')->nullable();
            $table->integer('palestras_prelecoes')->nullable();
            $table->integer('ebd')->nullable();
            $table->integer('msg_radio')->nullable();
            $table->integer('evangelizacao')->nullable();
            $table->integer('artigos_boletins_revistas')->nullable();
            $table->integer('estudos_biblicos')->nullable();
            $table->integer('entrevistas')->nullable();
            $table->integer('santa_ceia')->nullable();
            $table->integer('batismos')->nullable();
            $table->integer('bencaos_nupciais')->nullable();
            $table->integer('profissoes_fe')->nullable();
            $table->integer('funerais')->nullable();
            $table->integer('profissoes_batismos')->nullable();
            $table->integer('aconselhamentos')->nullable();
            $table->integer('visitas_lares')->nullable();
            $table->integer('visitas_igrejas')->nullable();
            $table->integer('departamentos_internos')->nullable();
            $table->text('descricao_atividades')->nullable();
            $table->integer('reunioes_conselho')->nullable();
            $table->integer('diaconos_ordenados_investidos')->nullable();
            $table->integer('presbiteros_ordenados_investidos')->nullable();
            $table->integer('assembleias')->nullable();
            $table->integer('reunioes_presbiterio')->nullable();
            $table->integer('reunioes_sinodo')->nullable();
            $table->integer('reunioes_concilio')->nullable();
            $table->text('comentarios')->nullable();
            $table->text('cargos_presbiterio')->nullable();
            $table->text('cargos_sinodo')->nullable();
            $table->text('cargos_concilio')->nullable();
            $table->text('cargos_outros')->nullable();
            $table->text('texto_complementar')->nullable();
            $table->text('atualizacao_aperfeicoamento')->nullable();
            $table->text('atividades_para_eclesiasticas')->nullable();
            $table->text('atividades_extras_ministeriais')->nullable();
            $table->text('atividades_outros')->nullable();
            $table->integer('usuario_inclusao')->index('relatorios_ministros_fk3');
            $table->string('data_inclusao', 10);
            $table->integer('usuario_alteracao')->nullable()->index('relatorios_ministros_fk4');
            $table->string('data_alteracao', 10)->nullable();
            $table->integer('status_relatorio')->nullable();
            $table->integer('tipo_relatorio')->default(2);
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
