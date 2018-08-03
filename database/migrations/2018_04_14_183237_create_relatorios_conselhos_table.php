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
            $table->increments('id');
            $table->string('ano', 4);
            $table->unsignedInteger('id_igreja');
            $table->foreign('id_igreja')->references('id')->on('igrejas');

            // 1.1
            $table->integer('or_imovel_documentado')->nullable();
            $table->integer('or_inventario_existe')->nullable();
            $table->integer('or_rol_membros_atualizado')->nullable();
            $table->integer('or_declaracao_ano_anterior_irenda')->nullable();
            $table->integer('or_declaracao_ano_anterior_rais')->nullable();
            $table->integer('or_declaracao_ano_anterior_dirf')->nullable();
            $table->integer('or_inventario_atualizado')->nullable();
            $table->integer('or_nr_congregacoes')->nullable();

            // 2.1
            $table->integer('se_santaceia_grupos')->nullable();
            $table->integer('se_santaceia_individual')->nullable();

            // 2.2
            $table->integer('se_atividades_evangelisticas')->nullable();
            $table->integer('se_textos_distribuidos_biblia')->nullable();
            $table->integer('se_textos_distribuidos_nt')->nullable();
            $table->integer('se_textos_distribuidos_folhetos')->nullable();
            $table->integer('se_textos_distribuidos_outros')->nullable();
            $table->integer('se_trabalho_missionario_jmn')->nullable()->comments('jmn,apmt,pmc,plantacao');
            $table->integer('se_trabalho_missionario_apmt')->nullable()->comments('jmn,apmt,pmc,plantacao');
            $table->integer('se_trabalho_missionario_pmc')->nullable()->comments('jmn,apmt,pmc,plantacao');
            $table->integer('se_trabalho_missionario_plantacao')->nullable()->comments('jmn,apmt,pmc,plantacao');
            $table->longText('se_trabalho_misisonario_outros')->nullable();

            // 2.3
            $table->integer('se_professores_ebd')->nullable();
            $table->integer('se_equipes_musicas')->nullable();
            $table->integer('se_oficiais')->nullable();
            $table->integer('se_lideranca')->nullable();
            $table->integer('se_grupos_corais')->nullable();
            $table->integer('se_conjuntos_musicas')->nullable();

            //2.4
            $table->integer('se_beneficientes_jdiaconal')->nullable();
            $table->integer('se_visitas_presbiteros_diaconos')->nullable();
            $table->integer('se_beneficientes_outros')->nullable();
            $table->integer('se_visitas_outros')->nullable();

            // 3.1
            $table->integer('sa_dizimo_fidelidade')->nullable();//3.1
            $table->integer('sa_reunioes_conselho')->nullable();//3.2
            $table->integer('sa_reunioes_jdiaconal')->nullable();//3.3
            $table->integer('sa_reunioes_assembleia')->nullable();//3.4
            $table->integer('sa_reunioes_mesa_administrativa')->nullable();//3.5
            $table->integer('sa_reunioes_tesouraria')->nullable();//3.6
            $table->integer('sa_balancete_tesouraria')->nullable();//3.7
            $table->integer('sa_idem_livros_sociedades')->nullable();//3.9

            $table->integer('sa_nomeacao')->nullable();//3.10
            $table->integer('sa_contribuicao_extra')->nullable();//3.11
            $table->integer('sa_contribuicao_previdencia')->nullable();//3.12
            $table->integer('sa_reforma_construcao_projeto')->nullable();//3.13

            $table->integer('sa_officiais_venc')->nullable();//3.8
            $table->integer('sa_officiais_venc_presbiteros')->nullable();//3.8
            $table->integer('sa_officiais_venc_diaconos')->nullable();//3.8
            $table->longText('sa_oficiais_vencimento')->nullable();//3.8 -> Quais?
            $table->integer('sa_fap')->nullable();//3.8
            $table->integer('sa_ipb_prev')->nullable();//3.8
            $table->integer('sa_reforma_construcao_andamento')->nullable();//3.14

            //4.1
            $table->integer('pe_tem_planejamento_estrategico')->nullable();
            $table->text('pe_objetivos_alcancados')->nullable();
            $table->text('pe_objetivos_falhos')->nullable();

            //5.1
            $table->integer('pat_seguro_patrimonial')->nullable();
            $table->integer('pat_alvara')->nullable();
            $table->integer('pat_licenca_bombeiros')->nullable();
            $table->integer('pat_certificado_digital')->nullable();

            $table->string('local')->nullable();
            $table->string('data', 10)->nullable();


            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
