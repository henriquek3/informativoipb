let id_row, tr_row, tbl_relatorios_ministeriais, tbl_api, validator;
tbl_relatorios_ministeriais = $("#tbl_relatorios_ministeriais");
//let relatorios_ministeriais;
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
                    $('#tbl_relatorios_ministeriais').append(tr);
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
            tbl_api = tbl_relatorios_ministeriais.DataTable({
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

    instanciaDataTables(); // init function instanciaDataTables() {};

    /**
     * Validador do Formulario, utilizado para incluir ou editar novos registros
     * @type {*|jQuery}
     */
    validator = $("#relatorios_ministeriais").validate({
        rules: {
            condicao_moradia: {
                required: true,
                minlength: 1,
                maxlength: 255
            },
            ordenacao_data: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            dedicacao_ministerio: {
                required: true,
                minlength: 1,
                maxlength: 20
            },
            ferias: {
                required: true,
                minlength: 1,
                maxlength: 10
            },
            congruas: {
                required: true,
                minlength: 1,
                maxlength: 10
            },
            previdencia_publica_valor: {
                required: true,
                minlength: 4,
                maxlength: 10
            },
            ct_igreja: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            ct_congregacoes: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            pregacoes: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            ebd: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            evangelizacao: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            estudos_biblicos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            palestras_prelecoes: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            msg_radio: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            artigos_boletins_revistas: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            entrevistas: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            santa_ceia: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            bencaos_nupciais: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            funerais: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            batismos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            profissoes_fe: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            profissoes_batismos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            aconselhamentos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            visitas_lares: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            visitas_igrejas: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            departamentos_internos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            descricao_atividades: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            reunioes_conselho: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            assembleias: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            diaconos_ordenados_investidos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            presbiteros_ordenados_investidos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            reunioes_presbiterio: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            reunioes_sinodo: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            reunioes_concilio: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            comentarios: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            cargos_presbiterio: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            cargos_sinodo: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            cargos_concilio: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            cargos_outros: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            texto_complementar: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            atualizacao_aperfeicoamento: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            atividades_para_eclesiasticas: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            atividades_extras_ministeriais: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            atividades_outros: {
                required: true,
                minlength: 1,
                maxlength: 255
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
            //let sinodo = $("select[name='id_sinodo'] :selected").text().slice(0, 4);
            //let regiao = $("select[name='regiao'] :selected").text();

            if (id_row > 0) {
                let form = $('#relatorios_ministeriais').serializeArray();
                form.unshift({name: 'id', value: id_row});
                $.post('api/relministeriais/update', form)
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
                            $(relatorios_ministeriais.sigla).parent().addClass("error");
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
                let form = $('#relatorios_ministeriais').serializeArray();
                $.post('api/relministeriais/store', form)
                    .done(function (response) {
                        response = response[0];
                        console.log(response);
                        tbl_api.row(tr_row).remove();
                        //id_row = response.id;
                        /*tbl_api.row.add([
                            response.id,
                            response.nome.toUpperCase(),
                            response.sigla.toUpperCase(),
                            sinodo,
                            regiao.toUpperCase()
                        ]).draw(false);*/

                    /*.done(function (response) {
                        id_row = response.id;
                        tbl_api.row.add([
                            response.id,
                            response.nome.toUpperCase(),
                            response.sigla.toUpperCase(),
                            sinodo,
                            regiao.toUpperCase()
                        ]).draw(false);*/

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
                            $(relatorios_ministeriais.sigla).parent().addClass("error");
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


    /** função para completar automaticamente os input's com os dados do usuário **/
    function getBdInfo() {
        $.get('api/presbiteros?id=' + id_row)
            .done(function (response) {
                console.log(response);
                let data = response[0];
                relatorios_ministeriais.id_presbitero.value = data.id;
                relatorios_ministeriais.nome.value = data.nome;
                relatorios_ministeriais.nome_pai.value = data.nome_pai;
                relatorios_ministeriais.nome_mae.value = data.nome_mae;
                relatorios_ministeriais.nascimento_data.value = data.nascimento_data;
                relatorios_ministeriais.nascimento_id_estado.value = data.nascimento_id_estado;
                relatorios_ministeriais.nascimento_id_cidade.value = data.nascimento_id_cidade;
                relatorios_ministeriais.rg.value = data.rg;
                relatorios_ministeriais.rg_emissor.value = data.rg_emissor;
                relatorios_ministeriais.cpf.value = data.cpf;
                relatorios_ministeriais.estado_civil.value = data.estado_civil;
                relatorios_ministeriais.conjuge_nome.value = data.conjuge_nome;
                relatorios_ministeriais.conjuge_nascimento.value = data.conjuge_nascimento;
                relatorios_ministeriais.nome_filhos.value = data.nome_filhos;
                relatorios_ministeriais.endereco.value = data.endereco;
                relatorios_ministeriais.endereco_nr.value = data.endereco_nr;
                relatorios_ministeriais.endereco_complemento.value = data.endereco_complemento;
                relatorios_ministeriais.endereco_bairro.value = data.endereco_bairro;
                relatorios_ministeriais.telefone.value = data.telefone;
                relatorios_ministeriais.celular.value = data.celular;
                relatorios_ministeriais.cep.value = data.cep;
                relatorios_ministeriais.cx_postal.value = data.cx_postal;
                relatorios_ministeriais.cx_postal_cep.value = data.cx_postal_cep;
                relatorios_ministeriais.email.value = data.email;
                relatorios_ministeriais.endereco_id_estado.value = data.endereco_id_estado;
                relatorios_ministeriais.endereco_id_cidade.value = data.endereco_id_cidade;
                relatorios_ministeriais.telefone_igreja.value = data.igreja.telefone;
            })
    }

    getBdInfo();



    /**
     * Traz as informações para edição
     */
    function getDataForm() {
        $.get('api/relministeriais?id=' + id_row)
            .done(function (response) {
                console.log(response);
                let data = response[0];
                //relatorios_ministeriais.sigla.value = data.sigla;
                //relatorios_ministeriais.regiao.value = data.regiao;
                //relatorios_ministeriais.id_presbitero.value = data.id_presbitero;
                //relatorios_ministeriais.ano.value = data.ano;
                //relatorios_ministeriais.id_igreja.value = data.id_igreja;
                //relatorios_ministeriais.nr_dependentes.value = data.nr_dependentes;
                relatorios_ministeriais.condicao_moradia.value = data.condicao_moradia;
                relatorios_ministeriais.ferias.value = data.ferias;
                relatorios_ministeriais.congruas.value = data.congruas;
                relatorios_ministeriais.previdencia_publica.value = data.previdencia_publica;
                relatorios_ministeriais.previdencia_privada.value = data.previdencia_privada;
                relatorios_ministeriais.plano_saude.value = data.plano_saude;
                relatorios_ministeriais.congruas_contribui_inss.value = data.congruas_contribui_inss;
                relatorios_ministeriais.previdencia_publica_valor.value = data.previdencia_publica_valor;
                relatorios_ministeriais.contribui_prev_privada.value = data.contribui_prev_privada;
                relatorios_ministeriais.dedicacao_ministerio.value = data.dedicacao_ministerio;
                relatorios_ministeriais.pregacoes.value = data.pregacoes;
                relatorios_ministeriais.palestras_prelecoes.value = data.palestras_prelecoes;
                relatorios_ministeriais.ebd.value = data.ebd;
                relatorios_ministeriais.msg_radio.value = data.msg_radio;
                relatorios_ministeriais.evangelizacao.value = data.evangelizacao;
                relatorios_ministeriais.artigos_boletins_revistas.value = data.artigos_boletins_revistas;
                relatorios_ministeriais.estudos_biblicos.value = data.estudos_biblicos;
                relatorios_ministeriais.entrevistas.value = data.entrevistas;
                relatorios_ministeriais.santa_ceia.value = data.santa_ceia;
                relatorios_ministeriais.batismos.value = data.batismos;
                relatorios_ministeriais.bencaos_nupciais.value = data.bencaos_nupciais;
                relatorios_ministeriais.profissoes_fe.value = data.profissoes_fe;
                relatorios_ministeriais.funerais.value = data.funerais;
                relatorios_ministeriais.profissoes_batismos.value = data.profissoes_batismos;
                relatorios_ministeriais.aconselhamentos.value = data.aconselhamentos;
                relatorios_ministeriais.visitas_lares.value = data.visitas_lares;
                relatorios_ministeriais.visitas_igrejas.value = data.visitas_igrejas;
                relatorios_ministeriais.departamentos_internos.value = data.departamentos_internos;
                relatorios_ministeriais.descricao_atividades.value = data.descricao_atividades;
                relatorios_ministeriais.reunioes_conselho.value = data.reunioes_conselho;
                relatorios_ministeriais.diaconos_ordenados_investidos.value = data.diaconos_ordenados_investidos;
                relatorios_ministeriais.presbiteros_ordenados_investidos.value = data.presbiteros_ordenados_investidos;
                relatorios_ministeriais.assembleias.value = data.assembleias;
                relatorios_ministeriais.reunioes_presbiterio.value = data.reunioes_presbiterio;
                relatorios_ministeriais.reunioes_sinodo.value = data.reunioes_sinodo;
                relatorios_ministeriais.reunioes_concilio.value = data.reunioes_concilio;
                relatorios_ministeriais.comentarios.value = data.comentarios;
                relatorios_ministeriais.cargos_presbiterio.value = data.cargos_presbiterio;
                relatorios_ministeriais.cargos_sinodo.value = data.cargos_sinodo;
                relatorios_ministeriais.cargos_concilio.value = data.cargos_concilio;
                relatorios_ministeriais.cargos_outros.value = data.cargos_outros;
                relatorios_ministeriais.texto_complementar.value = data.texto_complementar;
                relatorios_ministeriais.atualizacao_aperfeicoamento.value = data.atualizacao_aperfeicoamento;
                relatorios_ministeriais.atividades_para_eclesiasticas.value = data.atividades_para_eclesiasticas;
                relatorios_ministeriais.atividades_extras_ministeriais.value = data.atividades_extras_ministeriais;
                relatorios_ministeriais.atividades_outros.value = data.atividades_outros;
                $("#user_inc").text(data.user_inc);
                $("#data_inc").text(data.data_lancamento);
                $("#user_alt").text(data.user_inc);
                $("#data_alt").text(data.data_ultima_alteracao);

                /**
                 * espera um pouco depois de setar o valor para mudar o select para o valor
                 */
                setTimeout(() => {
                    $(relatorios_ministeriais.regiao).trigger("change");
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

    //getDataForm();



    function getDataSinodos() {
        $.get('api/sinodos')
            .done(function (response) {
                $(relatorios_ministeriais.id_sinodo).append($('<option />').text('- -'));

                $.each(response, function () {
                    $(relatorios_ministeriais.id_sinodo).append(
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
        $(relatorios_ministeriais.id_sinodo).on('change', function () {
            if ($(relatorios_ministeriais.id_sinodo).val() > 0) {
                $("select[name='id_presbiterio']").children().remove();
                $("#div_presbiterio").find(".search").hide();
                $("#loader_presbiterio").show();
                $.get('api/presbiterios?sinodo=' + $(relatorios_ministeriais.id_sinodo).val())
                    .done(function (response) {
                        $(relatorios_ministeriais.id_presbiterio).append($('<option />').text('- -'));
                        $.each(response, function () {
                            $(relatorios_ministeriais.id_presbiterio).append(
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
        $(relatorios_ministeriais.id_presbiterio).on('change', function () {
            if ($(relatorios_ministeriais.id_presbiterio).val() > 0) {
                $("select[name='id_igreja']").children().remove();
                $("#div_igreja").find(".search").hide();
                $("#loader_igreja").show();
                $.get('api/igrejas?presbiterio=' + $(relatorios_ministeriais.id_presbiterio).val())
                    .done(function (response) {
                        $(relatorios_ministeriais.id_igreja).append($('<option />').text('- -'));

                        $.each(response, function () {
                            $(relatorios_ministeriais.id_igreja).append(
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
                                relatorios_ministeriais.reset();
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
        let validator = $("#relatorios_ministeriais").validate({
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
                    let form = $('#relatorios_ministeriais').serializeArray();
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
                                $(relatorios_ministeriais.sigla).parent().addClass("error");
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
                    let form = $('#relatorios_ministeriais').serializeArray();
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
                                $(relatorios_ministeriais.sigla).parent().addClass("error");
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
        $("#relatorios_ministeriais").form({
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
                relatorios_ministeriais.reset();

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
