<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelatoriosConselhosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios_conselhos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ano', 10);
            $table->integer('id_igreja')->index('relatorios_conselhos_fk0');
            $table->integer('or_imovel_documentado')->nullable();
            $table->integer('or_declaracao_ano_anterior')->nullable();
            $table->integer('or_inventario_existe')->nullable();
            $table->integer('or_inventario_atualizado')->nullable();
            $table->integer('or_rol_membros_atualizado')->nullable();
            $table->integer('or_nr_congregacoes')->nullable();
            $table->integer('se_santaceia_grupos')->nullable();
            $table->integer('se_santaceia_individual')->nullable();
            $table->integer('se_atividades_evangelisticas')->nullable();
            $table->integer('se_textos_distribuidos_biblia')->nullable();
            $table->integer('se_textos_distribuidos_nt')->nullable();
            $table->integer('se_textos_distribuidos_folhetos')->nullable();
            $table->integer('se_textos_distribuidos_outros')->nullable();
            $table->integer('se_trabalho_missionario')->nullable();
            $table->text('se_trabalho_misisonario_outros')->nullable();
            $table->integer('se_professores_ebd')->nullable();
            $table->integer('se_grupos_corais')->nullable();
            $table->integer('se_equipes_musicas')->nullable();
            $table->integer('se_conjuntos_musicas')->nullable();
            $table->integer('se_oficiais')->nullable();
            $table->integer('se_lideranca')->nullable();
            $table->integer('se_beneficientes_jdiaconal')->nullable();
            $table->integer('se_beneficientes_outros')->nullable();
            $table->integer('se_visitas_presbiteros_diaconos')->nullable();
            $table->integer('se_visitas_outros')->nullable();
            $table->integer('sa_dizimo_fidelidade')->nullable();
            $table->integer('sa_reunioes_conselho')->nullable();
            $table->integer('sa_reunioes_jdiaconal')->nullable();
            $table->integer('sa_reunioes_assembleia')->nullable();
            $table->integer('sa_reunioes_mesa_administrativa')->nullable();
            $table->integer('sa_reunioes_tesouraria')->nullable();
            $table->integer('sa_balancete_tesouraria')->nullable();
            $table->integer('sa_officiais_venc')->nullable();
            $table->integer('sa_officiais_venc_presbiteros')->nullable();
            $table->integer('sa_officiais_venc_diaconos')->nullable();
            $table->integer('sa_id_oficiais_vencimento')->nullable()->index('relatorios_conselhos_fk1');
            $table->integer('sa_idem_livros_sociedades')->nullable();
            $table->integer('sa_nomeacao')->nullable();
            $table->integer('sa_contribuicao_extra')->nullable();
            $table->integer('sa_contribuicao_previdencia')->nullable();
            $table->integer('sa_fap')->nullable();
            $table->integer('sa_ipb_prev')->nullable();
            $table->integer('sa_reforma_construcao_projeto')->nullable();
            $table->integer('sa_reforma_construcao_andamento')->nullable();
            $table->integer('pe_exite_pe')->nullable();
            $table->text('pe_objetivos_sucesso')->nullable();
            $table->text('pe_objetivos_falha_dificuldades')->nullable();
            $table->integer('pa_seguro_patrimonial')->nullable();
            $table->integer('pa_licenca_bombeiros')->nullable();
            $table->integer('pa_alvara')->nullable();
            $table->integer('pa_certificado_digital')->nullable();
            $table->integer('usuario_inclusao')->index('relatorios_conselhos_fk2');
            $table->integer('usuario_alteracao')->nullable()->index('relatorios_conselhos_fk3');
            $table->integer('status_relatorio')->nullable();
            $table->integer('tipo_relatorio')->default(1);
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
        Schema::drop('relatorios_conselhos');
    }

}
