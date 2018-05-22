let id_row, tr_row, tbl_relatorios_estatisticas, tbl_api, validator;
tbl_relatorios_estatisticas = $("#tbl_relatorios_estatisticas");
//let relatorios_estatisticas;
$(document).ready(function () {
    /**
     * Função utilizada devido o select com ui.search.dropdown
     */
    $.validator.setDefaults({
        debug: true,
        ignore: ".search", // ignora validação onde estiver usando essa classe
        submitHandler: function () {
            return false;
        }
    });

    /**
     * cria o sidebar e adiciona um evento ao botão
     */
    $('.menu .item').tab();

    /**
     * Instancia o datepicker e atribui definições https://uxsolutions.github.io/bootstrap-datepicker/
     */
    $(".datepicker2").datepicker({
        todayBtn: "linked",
        daysOfWeekHighlighted: "0,6",
        autoclose: true,
        todayHighlight: true,
        language: "pt-BR"
    });

    /**
     * Instancia o search do dropdown semantic-ui
     */
    $('.ui.dropdown').dropdown();

    /**
     * Popular a Tabela com infos do banco
     */
    function getDataTable() {
        $.get('/api/presbiterios')
            .done(function (response) {
                for (let key in response) {
                    let tr, row, id, tipo_relatorio, data_lancamento, data_ultima_alteracao, status, ano;
                    tr = $('<tr/>');
                    row = response[key];
                    /**
                     * Adiciona células com as informações do banco de dados
                     * @type {jQuery}
                     */
                    id = $('<td/>').html(row.id);
                    data_lancamento = $('<td/>').html(row.data_lancamento);
                    data_ultima_alteracao = $('<td/>').html(row.data_ultima_alteracao);
                    tipo_relatorio = $('<td/>').html("Relatório do Conselho");
                    status = $('<td/>').html(row.status);
                    ano = $('<td/>').html(row.ano);

                    /**
                     * Adiciona as células nas linhas
                     */
                    tr.append(id)
                        .append(data_lancamento)
                        .append(data_ultima_alteracao)
                        .append(tipo_relatorio)
                        .append(ano)
                        .append(status);
                    /**
                     * Adiciona linhas na tabela
                     */
                    $('#tbl_relatorios_estatisticas').append(tr);
                }
            })
            .fail(function (response) {
                console.log(response);
            })
        ;
    }

    //getDataTable();

    /**
     * Instancia DataTables() e organiza os eventos do click
     */
    function instanciaDataTables() {
        setTimeout(function () {
            tbl_api = tbl_relatorios_estatisticas.DataTable({
                language: {
                    sEmptyTable: "Nenhum registro encontrado",
                    sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
                    sInfoFiltered: "(Filtrados de _MAX_ registros)",
                    sInfoPostFix: "",
                    sInfoThousands: ".",
                    sLengthMenu: "_MENU_  Resultados por página",
                    sLoadingRecords: "Carregando...",
                    sProcessing: "Processando...",
                    sZeroRecords: "Nenhum registro encontrado",
                    sSearch: "Pesquisar",
                    select: {
                        rows: "  |  %d linha selecionada"
                    },
                    oPaginate: {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    oAria: {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
            });

            tbl_api.page('next').draw(false); // ? Ativa paginação !

            /**
             * Utilizado para selecionar as linhas da tabela
             */
            $('#tbody_presbiterios').off("click", "**").on('click', 'tr', function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                    id_row = null;
                } else {
                    tbl_api.$('tr.active').removeClass('active');
                    $(this).addClass('active');
                    id_row = $(this).find('td:first').html();
                    tr_row = $(this);
                }
                /**
                 * exibe no console o nr da celula código da linha selecionada,
                 * que vem do banco de dados como o id do registro
                 */
                console.log(id_row);
            });
        }, 1000);
    }

    //instanciaDataTables(); // init function instanciaDataTables() {};


    /**
     * Validador do Formulario, utilizado para incluir ou editar novos registros
     * @type {*|jQuery}
     */
    validator = $("#relatorios_estatisticas").validate({
        rules: {
            ano: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            id_igreja: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ec_pastores: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecl_licenciados: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecl_presbiteros: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecl_diaconos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecl_evangelistas: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecl_missionarios: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecl_candidatos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ect_congregacoes: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ect_pontos_pregacao: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ect_ebd: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ect_professores: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ect_alunos_ebd_atual: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ect_alunos_ebd_anterior: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ect_alunos_ebd: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            di_ucp_dep: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            di_ucp_membros: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            di_upa_dep: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            di_upa_membros: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            di_ump_dep: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            di_ump_membros: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            di_saf_dep: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            di_saf_membros: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            di_uph_dep: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            di_uph_membros: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            di_outras_dep: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            di_outras_membros: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecd_departamentos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecd_ucp: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecd_upa: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecd_ump: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecd_saf: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecd_uph: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ecd_outras: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_profissao_fe_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_profissao_fe_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_profissao_batismo_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_profissao_batismo_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_transf_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_transf_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_jurisdicao_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_jurisdicao_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_restauracao_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_restauracao_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_designacao_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_designacao_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_batismo_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_batismo_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_transferencia_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_transferencia_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_jurisdicao_ex_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rma_jurisdicao_ex_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_transferencia_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_transferencia_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_falecimento_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_falecimento_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_exclucao_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_exclucao_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_ordenacao_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_ordenacao_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_profissao_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_profissao_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_transferencia_masc__ncomumg: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_transferencia_fem__ncomumg: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_falecimento_masc_ncomumg: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_falecimento_fem_ncomumg: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_exclusao_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_exclusao_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_separado_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_separado_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_diferenca_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_diferenca_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_comung_anterior_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_comung_anterior_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_comung_atual_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_comung_atual_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_dif_comung_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_dif_comung_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_nao_comung_anterior_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_nao_comung_anterior_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_nao_comung_atual_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_nao_comung_atual_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_rol_atual_masc: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            rmd_rol_atual_fem: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            fina_dizimos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            fina_ofertas_especificas: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            fina_patrimonio: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            fina_causas: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            fina_evangelismo: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            fina_missoes: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            fina_sustento_pastoral: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            fina_verba_presbiterial: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            fina_dizimo_supremo: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            finp_dizimos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            finp_ofertas_especificas: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            finp_patrimonio: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            finp_causas: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            finp_evangelismo: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            finp_missoes: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            finp_sustento_pastoral: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            finp_verba_presbiterial: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            finp_dizimo_supremo: {
                required: true,
                minlength: 1,
                maxlength: 5
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).parent().addClass(errorClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parent().removeClass(errorClass);
        },
        submitHandler: function () {
            /**
             * Estes campos são para popular o dataTable pelo nome e não pelo id do response
             * @type {jQuery}
             */
            let sinodo = $("select[name='id_sinodo'] :selected").text().slice(0, 4);
            let regiao = $("select[name='regiao'] :selected").text();

            if (id_row > 0) {
                let form = $('#relatorios_estatisticas').serializeArray();
                form.unshift({name: 'id', value: id_row});
                $.post('api/presbiterios/update', form)
                    .done(function (response) {
                        tbl_api.row(tr_row).remove();
                        tbl_api.row.add([
                            response.id,
                            response.nome.toUpperCase(),
                            response.sigla.toUpperCase(),
                            sinodo,
                            regiao.toUpperCase()
                        ]).draw(false);

                        iziToast.success({
                            title: 'OK',
                            message: 'Registro alterado com sucesso!',
                            timeout: 10000,
                            pauseOnHover: true,
                            position: 'topRight',
                            transitionIn: 'fadeInDown',
                            transitionOut: 'fadeOutUp'
                        });
                    })
                    .fail(function (response) {
                        console.log(response);
                        let str = response.responseText;
                        let result = str.indexOf("SQLSTATE[23000]");
                        if (result > 0) {
                            $(relatorios_estatisticas.sigla).parent().addClass("error");
                            iziToast.error({
                                title: 'Erro',
                                message: 'A sigla já existe, verifique se este sínodo já foi cadastrado.',
                                timeout: 10000,
                                pauseOnHover: true,
                                position: 'center',
                                transitionIn: 'fadeInDown',
                                transitionOut: 'fadeOutUp'
                            });
                        } else {
                            iziToast.error({
                                title: 'Erro',
                                message: 'Operação não realizada!',
                                timeout: 10000,
                                pauseOnHover: true,
                                position: 'topRight',
                                transitionIn: 'fadeInDown',
                                transitionOut: 'fadeOutUp'
                            });
                        }
                    })
                ;
            } else {
                let form = $('#relatorios_estatisticas').serializeArray();
                $.post('api/presbiterios/store', form)
                    .done(function (response) {
                        id_row = response.id;
                        tbl_api.row.add([
                            response.id,
                            response.nome.toUpperCase(),
                            response.sigla.toUpperCase(),
                            sinodo,
                            regiao.toUpperCase()
                        ]).draw(false);

                        iziToast.success({
                            title: 'OK',
                            message: 'Registro inserido com sucesso!',
                            timeout: 10000,
                            pauseOnHover: true,
                            position: 'topRight',
                            transitionIn: 'fadeInDown',
                            transitionOut: 'fadeOutUp'
                        });
                    })
                    .fail(function (response) {
                        console.log(response);
                        let str = response.responseText;
                        let result = str.indexOf("SQLSTATE[23000]");
                        if (result > 0) {
                            $(relatorios_estatisticas.sigla).parent().addClass("error");
                            iziToast.error({
                                title: 'Erro',
                                message: 'A sigla já existe, verifique se este sínodo já foi cadastrado.',
                                timeout: 10000,
                                pauseOnHover: true,
                                position: 'center',
                                transitionIn: 'fadeInDown',
                                transitionOut: 'fadeOutUp'
                            });
                        } else {
                            iziToast.error({
                                title: 'Erro',
                                message: 'Operação não realizada!',
                                timeout: 10000,
                                pauseOnHover: true,
                                position: 'topRight',
                                transitionIn: 'fadeInDown',
                                transitionOut: 'fadeOutUp'
                            });
                        }
                    })
                ;
            }
        }
    });


    /** Função de soma
     *
     */
    $("#fem, #masc").on("focusout", function () {
        $("#resultado").val(parseInt(document.relatorios_estatisticas.rma_profissao_fe_masc.value) + parseInt(document.relatorios_estatisticas.rma_profissao_fe_fem.value));
    });




    /**
     * Traz as informações para edição
     */
    function getDataForm() {
        $.get('api/presbiteros?id=' + id_row)
            .done(function (response) {
                console.log(response);
                let data = response[0];
                relatorios_estatisticas.nome.value = data.igreja.nome;
                //relatorios_estatisticas.sigla.value = data.sigla;
                //relatorios_estatisticas.regiao.value = data.regiao;
                //relatorios_estatisticas.ano.value = data.ano;
                relatorios_estatisticas.id_igreja.value = data.id_igreja;
                relatorios_estatisticas.ec_pastores.value = data.ec_pastores;
                relatorios_estatisticas.ecl_licenciados.value = data.ecl_licenciados;
                relatorios_estatisticas.ecl_presbiteros.value = data.ecl_presbiteros;
                relatorios_estatisticas.ecl_diaconos.value = data.ecl_diaconos;
                relatorios_estatisticas.ecl_evangelistas.value = data.ecl_evangelistas;
                relatorios_estatisticas.ecl_missionarios.value = data.ecl_missionarios;
                relatorios_estatisticas.ecl_candidatos.value = data.ecl_candidatos;
                relatorios_estatisticas.ect_congregacoes.value = data.ect_congregacoes;
                relatorios_estatisticas.ect_pontos_pregacao.value = data.ect_pontos_pregacao;
                relatorios_estatisticas.ect_ebd.value = data.ect_ebd;
                relatorios_estatisticas.ect_alunos_ebd.value = data.ect_alunos_ebd;
                relatorios_estatisticas.ecd_departamentos.value = data.ecd_departamentos;
                relatorios_estatisticas.ecd_ucp.value = data.ecd_ucp;
                relatorios_estatisticas.ecd_upa.value = data.ecd_upa;
                relatorios_estatisticas.ecd_ump.value = data.ecd_ump;
                relatorios_estatisticas.ecd_saf.value = data.ecd_saf;
                relatorios_estatisticas.ecd_uph.value = data.ecd_uph;
                relatorios_estatisticas.ecd_outras.value = data.ecd_outras;
                relatorios_estatisticas.rma_profissao_fe_masc.value = data.rma_profissao_fe_masc;
                relatorios_estatisticas.rma_profissao_fe_fem.value = data.rma_profissao_fe_fem;
                relatorios_estatisticas.rma_profissao_batismo_masc.value = data.rma_profissao_batismo_masc;
                relatorios_estatisticas.rma_profissao_batismo_fem.value = data.rma_profissao_batismo_fem;
                relatorios_estatisticas.rma_jurisdicao_masc.value = data.rma_jurisdicao_masc;
                relatorios_estatisticas.rma_jurisdicao_fem.value = data.rma_jurisdicao_fem;
                relatorios_estatisticas.rma_restauracao_masc.value = data.rma_restauracao_masc;
                relatorios_estatisticas.rma_restauracao_fem.value = data.rma_restauracao_fem;
                relatorios_estatisticas.rma_designacao_masc.value = data.rma_designacao_masc;
                relatorios_estatisticas.rma_designacao_fem.value = data.rma_designacao_fem;
                relatorios_estatisticas.rma_batismo_masc.value = data.rma_batismo_masc;
                relatorios_estatisticas.rma_batismo_fem.value = data.rma_batismo_fem;
                relatorios_estatisticas.rma_transferencia_masc.value = data.rma_transferencia_masc;
                relatorios_estatisticas.rma_transferencia_fem.value = data.rma_transferencia_fem;
                relatorios_estatisticas.rma_jurisdicao_ex_masc.value = data.rma_jurisdicao_ex_masc;
                relatorios_estatisticas.rma_jurisdicao_ex_fem.value = data.rma_jurisdicao_ex_fem;
                relatorios_estatisticas.rmd_transferencia_masc.value = data.rmd_transferencia_masc;
                relatorios_estatisticas.rmd_transferencia_fem.value = data.rmd_transferencia_fem;
                relatorios_estatisticas.rmd_falecimento_masc.value = data.rmd_falecimento_masc;
                relatorios_estatisticas.rmd_falecimento_fem.value = data.rmd_falecimento_fem;
                relatorios_estatisticas.rmd_exclucao_masc.value = data.rmd_exclucao_masc;
                relatorios_estatisticas.rmd_exclucao_fem.value = data.rmd_exclucao_fem;
                relatorios_estatisticas.rmd_ordenacao_masc.value = data.rmd_ordenacao_masc;
                relatorios_estatisticas.rmd_ordenacao_fem.value = data.rmd_ordenacao_fem;
                relatorios_estatisticas.rmd_profissao_masc.value = data.rmd_profissao_masc;
                relatorios_estatisticas.rmd_profissao_fem.value = data.rmd_profissao_fem;
                relatorios_estatisticas.rmd_transferencia_masc__ncomumg.value = data.rmd_transferencia_masc__ncomumg;
                relatorios_estatisticas.rmd_transferencia_fem__ncomumg.value = data.rmd_transferencia_fem__ncomumg;
                relatorios_estatisticas.rmd_falecimento_masc_ncomumg.value = data.rmd_falecimento_masc_ncomumg;
                relatorios_estatisticas.rmd_falecimento_fem_ncomumg.value = data.rmd_falecimento_fem_ncomumg;
                relatorios_estatisticas.rmd_exclusao_masc.value = data.rmd_exclusao_masc;
                relatorios_estatisticas.rmd_exclusao_fem.value = data.rmd_exclusao_fem;
                relatorios_estatisticas.fina_dizimos.value = data.fina_dizimos;
                relatorios_estatisticas.fina_ofertas_especificas.value = data.fina_ofertas_especificas;
                relatorios_estatisticas.fina_patrimonio.value = data.fina_patrimonio;
                relatorios_estatisticas.fina_causas.value = data.fina_causas;
                relatorios_estatisticas.fina_evangelismo.value = data.fina_evangelismo;
                relatorios_estatisticas.fina_missoes.value = data.fina_missoes;
                relatorios_estatisticas.fina_sustento_pastoral.value = data.fina_sustento_pastoral;
                relatorios_estatisticas.fina_verba_presbiterial.value = data.fina_verba_presbiterial;
                relatorios_estatisticas.fina_dizimo_supremo.value = data.fina_dizimo_supremo;
                relatorios_estatisticas.finp_dizimos.value = data.finp_dizimos;
                relatorios_estatisticas.finp_ofertas_especificas.value = data.finp_ofertas_especificas;
                relatorios_estatisticas.finp_patrimonio.value = data.finp_patrimonio;
                relatorios_estatisticas.finp_causas.value = data.finp_causas;
                relatorios_estatisticas.finp_evangelismo.value = data.finp_evangelismo;
                relatorios_estatisticas.finp_missoes.value = data.finp_missoes;
                relatorios_estatisticas.finp_sustento_pastoral.value = data.finp_sustento_pastoral;
                relatorios_estatisticas.finp_verba_presbiterial.value = data.finp_verba_presbiterial;
                relatorios_estatisticas.finp_dizimo_supremo.value = data.finp_dizimo_supremo;
                relatorios_estatisticas.id_presbitero_conselho.value = data.id_presbitero_conselho;
                $("#user_inc").text(data.user_inc);
                $("#data_inc").text(data.data_lancamento);
                $("#user_alt").text(data.user_inc);
                $("#data_alt").text(data.data_ultima_alteracao);

                /**
                 * espera um pouco depois de setar o valor para mudar o select para o valor
                 */
                setTimeout(() => {
                    $(relatorios_estatisticas.regiao).trigger("change");
                }, 100);
            })
            .fail(function (response) {
                console.log(response);
                iziToast.error({
                    title: 'Erro',
                    message: 'Operação não realizada!',
                    timeout: 10000,
                    pauseOnHover: true,
                    position: 'topRight',
                    transitionIn: 'fadeInDown',
                    transitionOut: 'fadeOutUp'
                });
            })
        ;
    }

    getDataForm();

    function getDataSinodos() {
        $.get('api/sinodos')
            .done(function (response) {
                $(relatorios_estatisticas.id_sinodo).append($('<option />').text('- -'));

                $.each(response, function () {
                    $(relatorios_estatisticas.id_sinodo).append(
                        $('<option />').val(this.id).text(this.sigla.toUpperCase() + " / " + this.nome.toUpperCase())
                    );
                });
            })
            .fail(function (response) {
                console.log(response);
                iziToast.warning({
                    title: 'Erro',
                    message: 'Consulta não realizada, verifique sua conexão!',
                });
            })
        ;
    }

    getDataSinodos();

    function getDataPresbiterio() {
        $(relatorios_estatisticas.id_sinodo).on('change', function () {
            if ($(relatorios_estatisticas.id_sinodo).val() > 0) {
                $("select[name='id_presbiterio']").children().remove();
                $("#div_presbiterio").find(".search").hide();
                $("#loader_presbiterio").show();
                $.get('api/presbiterios?sinodo=' + $(relatorios_estatisticas.id_sinodo).val())
                    .done(function (response) {
                        $(relatorios_estatisticas.id_presbiterio).append($('<option />').text('- -'));
                        $.each(response, function () {
                            $(relatorios_estatisticas.id_presbiterio).append(
                                $('<option />').val(this.id).text(this.sigla.toUpperCase() + " / " + this.nome.toUpperCase())
                            );
                        });
                        $("#div_presbiterio").find(".search").show();
                        $("#loader_presbiterio").hide()
                    })
                    .fail(function (response) {
                        iziToast.error({
                            title: 'Erro',
                            message: 'Consulta não realizada, verifique sua conexão',
                        });
                    })
                ;
            }
        });
    }

    getDataPresbiterio();

    function getDataIgreja() {
        $(relatorios_estatisticas.id_presbiterio).on('change', function () {
            if ($(relatorios_estatisticas.id_presbiterio).val() > 0) {
                $("select[name='id_igreja']").children().remove();
                $("#div_igreja").find(".search").hide();
                $("#loader_igreja").show();
                $.get('api/igrejas?presbiterio=' + $(relatorios_estatisticas.id_presbiterio).val())
                    .done(function (response) {
                        $(relatorios_estatisticas.id_igreja).append($('<option />').text('- -'));

                        $.each(response, function () {
                            $(relatorios_estatisticas.id_igreja).append(
                                $('<option />').val(this.id).text(this.nome.toUpperCase())
                            );
                        });

                        $("#div_igreja").find(".search").show();
                        $("#loader_igreja").hide()
                    })
                    .fail(function (response) {
                        iziToast.error({
                            title: 'Erro',
                            message: 'Consulta não realizada, verifique sua conexão',
                        });
                    })
                ;
            }
        });
    }

    getDataIgreja();

    /**
     * Exclui as informações do banco de dados
     * @returns {boolean}
     */
    function deleteData() {
        if (id_row > 0) {
            swal({
                title: "Você tem certeza disso?",
                text: "Uma vez deletado, não há como desfazer!",
                icon: "warning",
                dangerMode: true,
                buttons: {
                    cancel: {
                        text: "Cancelar",
                        visible: true,
                        value: false,
                        closeModal: true,
                    },
                    confirm: true
                },
                closeModal: false,
                closeOnClickOutside: false,
            })
                .then((resolve) => {
                    if (resolve) {
                        $.post('/api/presbiterios/delete', {id: id_row})
                            .done(function () {
                                tbl_api.row('.active').remove().draw(false);
                                swal("Deletado!", "Seu registro foi deletado.", "success");
                                id_row = null;
                                relatorios_estatisticas.reset();
                            })
                            .fail(function (response) {
                                console.log(response);
                                swal("Erro!", response.responseText, "error");
                            })
                        ;
                    } else {
                        swal.close();
                    }
                })
            ;
        }
    }

    /*    /!**
         * Validador do Formulario, utilizado para incluir ou editar novos registros
         * @type {*|jQuery}
         *!/
        let validator = $("#relatorios_estatisticas").validate({
            rules: {
                nome: {
                    required: true,
                    minlength: 4,
                    maxlength: 255
                },
                sigla: {
                    required: true,
                    minlength: 3,
                    maxlength: 5
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).parent().addClass(errorClass);
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parent().removeClass(errorClass);
            },
            invalidHandler: function () {
                alert("invelid handler");
            },
            submitHandler: function () {
                if (id_row > 0) {
                    let form = $('#relatorios_estatisticas').serializeArray();
                    form.unshift({name: 'id', value: id_row});
                    $.post('api/presbiterios/update', form)
                       .done(function (response) {
                            console.log(response);
                            tbl_api.row(tr_row).remove();
                            tbl_api.row.add([
                                response.id,
                                response.nome.toUpperCase(),
                                response.sigla.toUpperCase(),
                                response.regiao.toUpperCase()
                            ]).draw(false);

                            iziToast.success({
                                title: 'OK',
                                message: 'Registro alterado com sucesso!',
                                timeout: 10000,
                                pauseOnHover: true,
                                position: 'topRight',
                                transitionIn: 'fadeInDown',
                                transitionOut: 'fadeOutUp'
                            });
                        })
                       .fail(function (response) {
                            console.log(response);
                            let str = response.responseText;
                            let result = str.indexOf("SQLSTATE[23000]");
                            if (result > 0) {
                                $(relatorios_estatisticas.sigla).parent().addClass("error");
                                iziToast.error({
                                    title: 'Erro',
                                    message: 'A sigla já existe, verifique se este sínodo já foi cadastrado.',
                                    timeout: 10000,
                                    pauseOnHover: true,
                                    position: 'center',
                                    transitionIn: 'fadeInDown',
                                    transitionOut: 'fadeOutUp'
                                });
                            } else {
                                iziToast.error({
                                    title: 'Erro',
                                    message: 'Operação não realizada!',
                                    timeout: 10000,
                                    pauseOnHover: true,
                                    position: 'topRight',
                                    transitionIn: 'fadeInDown',
                                    transitionOut: 'fadeOutUp'
                                });
                            }
                        })
                   ;
                } else {
                    let form = $('#relatorios_estatisticas').serializeArray();
                    $.post('api/presbiterios/store', form)
                       .done(function (response) {
                            console.log(response);

                            tbl_api.row.add([
                                response.id,
                                response.nome.toUpperCase(),
                                response.sigla.toUpperCase(),
                                response.regiao.toUpperCase()
                            ]).draw(false);

                            iziToast.success({
                                title: 'OK',
                                message: 'Registro inserido com sucesso!',
                                timeout: 10000,
                                pauseOnHover: true,
                                position: 'topRight',
                                transitionIn: 'fadeInDown',
                                transitionOut: 'fadeOutUp'
                            });
                        })
                       .fail(function (response) {
                            console.log(response);
                            let str = response.responseText;
                            let result = str.indexOf("SQLSTATE[23000]");
                            if (result > 0) {
                                $(relatorios_estatisticas.sigla).parent().addClass("error");
                                iziToast.error({
                                    title: 'Erro',
                                    message: 'A sigla já existe, verifique se este sínodo já foi cadastrado.',
                                    timeout: 10000,
                                    pauseOnHover: true,
                                    position: 'center',
                                    transitionIn: 'fadeInDown',
                                    transitionOut: 'fadeOutUp'
                                });
                            } else {
                                iziToast.error({
                                    title: 'Erro',
                                    message: 'Operação não realizada!',
                                    timeout: 10000,
                                    pauseOnHover: true,
                                    position: 'topRight',
                                    transitionIn: 'fadeInDown',
                                    transitionOut: 'fadeOutUp'
                                });
                            }
                        })
                   ;
                }
            }
        });

        /!**
         * Os campos select do semantic não são compativeis com o jquery validation,
         * a msg fica bugada, usar desta forma para select.search.dropdown
         *!/
        $("#relatorios_estatisticas").form({
            inline: true,
            on: 'submit',
            fields: {
                dropdown: {
                    identifier: 'regiao',
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Este campo é requerido.'
                        }
                    ]
                }
            }
        });

        /!**
         * Ao clicar no botão limpar, reseta as classes de erro
         *!/
        $(".ui.reset.button").on("click", function () {
            validator.resetForm();
            $('form').form('reset');
        });

        /!**
         * Adiciona evento de exclusão no botão Excluir
         *!/
        $("button[type='button']").on("click", function () {
            deleteData();
        });

        /!**
         *  Função para ativar o get
         *!/
        $("a[data-tab='second']").on("click", function () {
            if (id_row > 0) {
                getDataForm();
            } else {
                /!**
                 * reseta os campos do tipo input
                 *!/
                relatorios_estatisticas.reset();

                /!**
                 * retorna o select para a primera opção
                 * @type {number}
                 *!/
                validator.resetForm();
                $('form').form('reset');
            }
        });

        /!**
         * Função para quando for na aba lista, zerar o id_row
         *!/
        $("a[data-tab='first']").on("click", function () {
            if (id_row > 0) {
                id_row = null;
                tbl_api.row().deselect();
                tbl_api.$('tr.active').removeClass('active');
            }
        });*/
});
