let id_row, tr_row, tbl_reletorios_conselhos, tbl_api, validator;
tbl_reletorios_conselhos = $("#tbl_reletorios_conselhos");
//let relatorios_conselhos;
$(document).ready(function () {
    /**
     * Função utilizada devido o select com ui.search.dropdown
     */
    $.validator.setDefaults({
        debug: true,
        ignore: ".search, .hidden,  *:not([name])", // ignora validação onde estiver usando essa classe
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
            $.get('/api/relconselhos')
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
                    $('#tbody_relatorios_conselhos').append(tr);
                }
            })
            .fail(function (response) {
                console.log(response);
            })
        ;
    }

    getDataTable();


    /**
     * Instancia DataTables() e organiza os eventos do click
     */
    function instanciaDataTables() {
        setTimeout(function () {
            tbl_api = tbl_reletorios_conselhos.DataTable({
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
            $('#tbody_relatorios_conselhos').off("click", "**").on('click', 'tr', function () {
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
    validator = $("#relatorios_conselhos").validate({
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
            },
            se_santaceia_grupos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            se_santaceia_individual: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            se_atividades_evangelisticas: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            se_textos_distribuidos_biblia: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            se_textos_distribuidos_nt: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            se_textos_distribuidos_folhetos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            se_textos_distribuidos_outros: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            se_trabalho_misisonario_outros: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            se_grupos_corais: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            se_conjuntos_musicas: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            se_beneficientes_jdiaconal: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            se_visitas_presbiteros_diaconos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            se_beneficientes_outros: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            e_visitas_outros: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            sa_officiais_venc_presbiteros: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            sa_officiais_venc_diaconos: {
                required: true,
                minlength: 1,
                maxlength: 5
            },
            sa_id_oficiais_vencimento: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            sa_reforma_construcao_projeto: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            sa_reforma_construcao_andamento: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            pe_objetivos_sucesso: {
                required: true,
                minlength: 1,
                maxlength: 1024
            },
            pe_objetivos_falha_dificuldades: {
                required: true,
                minlength: 1,
                maxlength: 1024
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
                let form = $('#relatorios_conselhos').serializeArray();
                form.unshift({name: 'id', value: id_row});
                $.post('api/relconselhos/update', form)
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
                        console.log(form);
                        let str = response.responseText;
                        let result = str.indexOf("SQLSTATE[23000]");
                        if (result > 0) {
                            $(relatorios_conselhos.sigla).parent().addClass("error");
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
                let form = $('#relatorios_conselhos').serializeArray();
                console.log(form);
                $.post('api/relconselhos/store', form)
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
                            $(relatorios_conselhos.sigla).parent().addClass("error");
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

    function testeGet() {
        $.get('api/igrejas?id=' + id_row)
            .done(function (response) {
                console.log(response)
                let data = response[0];
                relatorios_conselhos.nome_igreja.value = data.nome;
                relatorios_conselhos.endereco.value = data.endereco;
                relatorios_conselhos.endereco_numero.value = data.endereco_numero;
                relatorios_conselhos.endereco_complemento.value = data.endereco_complemento;
                relatorios_conselhos.endereco_bairro.value = data.endereco_bairro;
                relatorios_conselhos.estado.value = data.id_estado;
                relatorios_conselhos.cidade.value = data.id_cidade;
                relatorios_conselhos.endereco_cep.value = data.endereco_cep;
                relatorios_conselhos.endereco_cx_postal.value = data.endereco_cx_postal;
                relatorios_conselhos.endereco_cx_cep.value = data.endereco_cx_cep;
                relatorios_conselhos.telefone.value = data.telefone;
                relatorios_conselhos.homepage.value = data.website;
                relatorios_conselhos.cnpj.value = data.cnpj;
                relatorios_conselhos.data_organizacao.value = data.data_organizacao;
            })
    }

    testeGet();

    /**
     * Traz as informações para edição
     */
    function getDataForm() {
        $.get('api/usuarios?id=' + id_row)
            .done(function (response) {
                console.log(response);
                let data = response[0];
                relatorios_conselhos.email.value = data.email;
                //relatorios_conselhos.cpf.value = data.cpf;
                //relatorios_conselhos.observacoes.value = data.observacoes;
                relatorios_conselhos.or_imovel_documentado.value = data.or_imovel_documentado;
                //relatorios_conselhos.ano.value = data.ano;
                relatorios_conselhos.id_igreja.value = data.id_igreja;
                relatorios_conselhos.or_imovel_documentado.value = data.or_imovel_documentado;
                relatorios_conselhos.or_declaracao_ano_anterior.value = data.or_declaracao_ano_anterior;
                relatorios_conselhos.or_inventario_existe.value = data.or_inventario_existe;
                relatorios_conselhos.or_inventario_atualizado.value = data.or_inventario_atualizado;
                relatorios_conselhos.or_rol_membros_atualizado.value = data.or_rol_membros_atualizado;
                relatorios_conselhos.or_nr_congregacoes.value = data.or_nr_congregacoes;
                relatorios_conselhos.se_santaceia_grupos.value = data.se_santaceia_grupos;
                relatorios_conselhos.se_santaceia_individual.value = data.se_santaceia_individual;
                relatorios_conselhos.se_atividades_evangelisticas.value = data.se_atividades_evangelisticas;
                relatorios_conselhos.se_textos_distribuidos_biblia.value = data.se_textos_distribuidos_biblia;
                relatorios_conselhos.se_textos_distribuidos_nt.value = data.se_textos_distribuidos_nt;
                relatorios_conselhos.se_textos_distribuidos_folhetos.value = data.se_textos_distribuidos_folhetos;
                relatorios_conselhos.se_textos_distribuidos_outros.value = data.se_textos_distribuidos_outros;
                relatorios_conselhos.se_trabalho_missionario.value = data.se_trabalho_missionario;
                relatorios_conselhos.se_trabalho_misisonario_outros.value = data.se_trabalho_misisonario_outros;
                relatorios_conselhos.se_professores_ebd.value = data.se_professores_ebd;
                relatorios_conselhos.se_grupos_corais.value = data.se_grupos_corais;
                relatorios_conselhos.se_equipes_musicas.value = data.se_equipes_musicas;
                relatorios_conselhos.se_conjuntos_musicas.value = data.se_conjuntos_musicas;
                relatorios_conselhos.se_oficiais.value = data.se_oficiais;
                relatorios_conselhos.se_lideranca.value = data.se_lideranca;
                relatorios_conselhos.se_beneficientes_jdiaconal.value = data.se_beneficientes_jdiaconal;
                relatorios_conselhos.se_beneficientes_outros.value = data.se_beneficientes_outros;
                relatorios_conselhos.se_visitas_presbiteros_diaconos.value = data.se_visitas_presbiteros_diaconos;
                relatorios_conselhos.se_visitas_outros.value = data.se_visitas_outros;
                relatorios_conselhos.sa_dizimo_fidelidade.value = data.sa_dizimo_fidelidade;
                relatorios_conselhos.sa_reunioes_conselho.value = data.sa_reunioes_conselho;
                relatorios_conselhos.sa_reunioes_jdiaconal.value = data.sa_reunioes_jdiaconal;
                relatorios_conselhos.sa_reunioes_assembleia.value = data.sa_reunioes_assembleia;
                relatorios_conselhos.sa_reunioes_mesa_administrativa.value = data.sa_reunioes_mesa_administrativa;
                relatorios_conselhos.sa_reunioes_tesouraria.value = data.sa_reunioes_tesouraria;
                relatorios_conselhos.sa_balancete_tesouraria.value = data.sa_balancete_tesouraria;
                relatorios_conselhos.sa_officiais_venc.value = data.sa_officiais_venc;
                relatorios_conselhos.sa_officiais_venc_presbiteros.value = data.sa_officiais_venc_presbiteros;
                relatorios_conselhos.sa_officiais_venc_diaconos.value = data.sa_officiais_venc_diaconos;
                relatorios_conselhos.sa_id_oficiais_vencimento.value = data.sa_id_oficiais_vencimento;
                relatorios_conselhos.sa_idem_livros_sociedades.value = data.sa_idem_livros_sociedades;
                relatorios_conselhos.sa_nomeacao.value = data.sa_nomeacao;
                relatorios_conselhos.sa_contribuicao_extra.value = data.sa_contribuicao_extra;
                relatorios_conselhos.sa_contribuicao_previdencia.value = data.sa_contribuicao_previdencia;
                relatorios_conselhos.sa_fap.value = data.sa_fap;
                relatorios_conselhos.sa_ipb_prev.value = data.sa_ipb_prev;
                relatorios_conselhos.sa_reforma_construcao_projeto.value = data.sa_reforma_construcao_projeto;
                relatorios_conselhos.sa_reforma_construcao_andamento.value = data.sa_reforma_construcao_andamento;
                relatorios_conselhos.pe_exite_pe.value = data.pe_exite_pe;
                relatorios_conselhos.pe_objetivos_sucesso.value = data.pe_objetivos_sucesso;
                relatorios_conselhos.pe_objetivos_falha_dificuldades.value = data.pe_objetivos_falha_dificuldades;
                relatorios_conselhos.pa_seguro_patrimonial.value = data.pa_seguro_patrimonial;
                relatorios_conselhos.pa_licenca_bombeiros.value = data.pa_licenca_bombeiros;
                relatorios_conselhos.pa_alvara.value = data.pa_alvara;
                relatorios_conselhos.pa_certificado_digital.value = data.pa_certificado_digital;
                $("#user_inc").text(data.user_inc);
                $("#data_inc").text(data.data_lancamento);
                $("#user_alt").text(data.user_inc);
                $("#data_alt").text(data.data_ultima_alteracao);

                /**
                 * espera um pouco depois de setar o valor para mudar o select para o valor
                 */
                setTimeout(() => {
                    $(relatorios_conselhos.regiao).trigger("change");
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
                $(relatorios_conselhos.id_sinodo).append($('<option />').text('- -'));

                $.each(response, function () {
                    $(relatorios_conselhos.id_sinodo).append(
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
        $(relatorios_conselhos.id_sinodo).on('change', function () {
            if ($(relatorios_conselhos.id_sinodo).val() > 0) {
                $("select[name='id_presbiterio']").children().remove();
                $("#div_presbiterio").find(".search").hide();
                $("#loader_presbiterio").show();
                $.get('api/presbiterios?sinodo=' + $(relatorios_conselhos.id_sinodo).val())
                    .done(function (response) {
                        $(relatorios_conselhos.id_presbiterio).append($('<option />').text('- -'));
                        $.each(response, function () {
                            $(relatorios_conselhos.id_presbiterio).append(
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
        $(relatorios_conselhos.id_presbiterio).on('change', function () {
            if ($(relatorios_conselhos.id_presbiterio).val() > 0) {
                $("select[name='id_igreja']").children().remove();
                $("#div_igreja").find(".search").hide();
                $("#loader_igreja").show();
                $.get('api/igrejas?presbiterio=' + $(relatorios_conselhos.id_presbiterio).val())
                    .done(function (response) {
                        $(relatorios_conselhos.id_igreja).append($('<option />').text('- -'));

                        $.each(response, function () {
                            $(relatorios_conselhos.id_igreja).append(
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
                        $.post('/api/relconselhos/delete', {id: id_row})
                            .done(function () {
                                tbl_api.row('.active').remove().draw(false);
                                swal("Deletado!", "Seu registro foi deletado.", "success");
                                id_row = null;
                                relatorios_conselhos.reset();
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
        let validator = $("#relatorios_conselhos").validate({
            rules: {
                data_lancamento: {
                    required: true,
                    minlength: 4,
                    maxlength: 255
                },
                data_ultima_alteracao: {
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
                    let form = $('#relatorios_conselhos').serializeArray();
                    form.unshift({name: 'id', value: id_row});
                    $.post('api/presbiterios/update', form)
                       .done(function (response) {
                            console.log(response);
                            tbl_api.row(tr_row).remove();
                            tbl_api.row.add([
                                response.id,
                                response.data_lancamento.toUpperCase(),
                                response.data_ultima_alteracao.toUpperCase(),
                                response.tipo_relatorio.toUpperCase()
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
                                $(relatorios_conselhos.data_ultima_alteracao).parent().addClass("error");
                                iziToast.error({
                                    title: 'Erro',
                                    message: 'A data_ultima_alteracao já existe, verifique se este sínodo já foi cadastrado.',
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
                    let form = $('#relatorios_conselhos').serializeArray();
                    $.post('api/presbiterios/store', form)
                       .done(function (response) {
                            console.log(response);

                            tbl_api.row.add([
                                response.id,
                                response.data_lancamento.toUpperCase(),
                                response.data_ultima_alteracao.toUpperCase(),
                                response.tipo_relatorio.toUpperCase()
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
                                $(relatorios_conselhos.data_ultima_alteracao).parent().addClass("error");
                                iziToast.error({
                                    title: 'Erro',
                                    message: 'A data_ultima_alteracao já existe, verifique se este sínodo já foi cadastrado.',
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
        $("#relatorios_conselhos").form({
            inline: true,
            on: 'submit',
            fields: {
                dropdown: {
                    identifier: 'tipo_relatorio',
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
                relatorios_conselhos.reset();

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
