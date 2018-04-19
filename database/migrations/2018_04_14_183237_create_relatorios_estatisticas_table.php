<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRelatoriosEstatisticasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorios_estatisticas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('ano', 10);
            $table->integer('id_igreja')->index('relatorios_estatisticas_fk0');
            $table->integer('ec_pastores')->nullable();
            $table->integer('ecl_licenciados')->nullable();
            $table->integer('ecl_presbiteros')->nullable();
            $table->integer('ecl_diaconos')->nullable();
            $table->integer('ecl_evangelistas')->nullable();
            $table->integer('ecl_missionarios')->nullable();
            $table->integer('ecl_candidatos')->nullable();
            $table->integer('ect_congregacoes')->nullable();
            $table->integer('ect_pontos_pregacao')->nullable();
            $table->integer('ect_ebd')->nullable();
            $table->integer('ect_alunos_ebd')->nullable();
            $table->integer('ecd_departamentos')->nullable();
            $table->integer('ecd_ucp')->nullable();
            $table->integer('ecd_upa')->nullable();
            $table->integer('ecd_ump')->nullable();
            $table->integer('ecd_saf')->nullable();
            $table->integer('ecd_uph')->nullable();
            $table->integer('ecd_outras')->nullable();
            $table->integer('rma_profissao_fe_masc')->nullable();
            $table->integer('rma_profissao_fe_fem')->nullable();
            $table->integer('rma_profissao_batismo_masc')->nullable();
            $table->integer('rma_profissao_batismo_fem')->nullable();
            $table->integer('rma_jurisdicao_masc')->nullable();
            $table->integer('rma_jurisdicao_fem')->nullable();
            $table->integer('rma_restauracao_masc')->nullable();
            $table->integer('rma_restauracao_fem')->nullable();
            $table->integer('rma_designacao_masc')->nullable();
            $table->integer('rma_designacao_fem')->nullable();
            $table->integer('rma_batismo_masc')->nullable();
            $table->integer('rma_batismo_fem')->nullable();
            $table->integer('rma_transferencia_masc')->nullable();
            $table->integer('rma_transferencia_fem')->nullable();
            $table->integer('rma_jurisdicao_ex_masc')->nullable();
            $table->integer('rma_jurisdicao_ex_fem')->nullable();
            $table->integer('rmd_transferencia_masc')->nullable();
            $table->integer('rmd_transferencia_fem')->nullable();
            $table->integer('rmd_falecimento_masc')->nullable();
            $table->integer('rmd_falecimento_fem')->nullable();
            $table->integer('rmd_exclucao_masc')->nullable();
            $table->integer('rmd_exclucao_fem')->nullable();
            $table->integer('rmd_ordenacao_masc')->nullable();
            $table->integer('rmd_ordenacao_fem')->nullable();
            $table->integer('rmd_profissao_masc')->nullable();
            $table->integer('rmd_profissao_fem')->nullable();
            $table->integer('rmd_transferencia_masc__ncomumg')->nullable();
            $table->integer('rmd_transferencia_fem__ncomumg')->nullable();
            $table->integer('rmd_falecimento_masc_ncomumg')->nullable();
            $table->integer('rmd_falecimento_fem_ncomumg')->nullable();
            $table->integer('rmd_exclusao_masc')->nullable();
            $table->integer('rmd_exclusao_fem')->nullable();
            $table->string('fina_dizimos', 20)->nullable();
            $table->string('fina_ofertas_especificas', 20)->nullable();
            $table->string('fina_patrimonio', 20)->nullable();
            $table->string('fina_causas', 20)->nullable();
            $table->string('fina_evangelismo', 20)->nullable();
            $table->string('fina_missoes', 20)->nullable();
            $table->string('fina_sustento_pastoral', 20)->nullable();
            $table->string('fina_verba_presbiterial', 20)->nullable();
            $table->string('fina_dizimo_supremo', 20)->nullable();
            $table->string('finp_dizimos', 20)->nullable();
            $table->string('finp_ofertas_especificas', 20)->nullable();
            $table->string('finp_patrimonio', 20)->nullable();
            $table->string('finp_causas', 20)->nullable();
            $table->string('finp_evangelismo', 20)->nullable();
            $table->string('finp_missoes', 20)->nullable();
            $table->string('finp_sustento_pastoral', 20)->nullable();
            $table->string('finp_verba_presbiterial', 20)->nullable();
            $table->string('finp_dizimo_supremo', 20)->nullable();
            $table->integer('id_presbitero_conselho')->index('relatorios_estatisticas_fk1');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('status_relatorio')->nullable();
            $table->integer('tipo_relatorio')->default(3);
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
        Schema::drop('relatorios_estatisticas');
    }

}
