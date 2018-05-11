let id_row, tr_row, tbl_presbiteros, tbl_api;
tbl_presbiteros = $("#tbl_presbiteros");

$(document).ready(function () {
    /**
     * Estilizar o input de pesquisar do
     * @type {{first: first, second: second}}
     */
    let styleInputSearch = {
        first: function() {
            setTimeout(() => {
                $("input[type='search']").parent().addClass("ui icon input");
                $("input[type='search']").css("width", "220px");
                $("input[type='search']").css("margin-left", "10px");
            }, 500);
            return styleInputSearch; },
        second: function() {
            setTimeout(() => {
                $("input[type='search']").after("<i class='search icon'>");
            }, 1000);
            return styleInputSearch; }
    };
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
        $.get('/api/presbiteros')
            .done(function (response) {
                for (let key in response) {
                    let tr, row, id, regiao, nome, igreja, sinodo;
                    tr = $('<tr/>');
                    row = response[key];
                    /**
                     * Adiciona células com as informações do banco de dados
                     * @type {jQuery}
                     */
                    id = $('<td/>').html(row.id);
                    nome = $('<td/>').html(row.nome.toUpperCase());
                    igreja = $('<td/>').html(row.nascimento_id_cidade.toUpperCase());
                    sinodo = $('<td/>').html(row.nome_pai.toUpperCase());
                    regiao = $('<td/>').html(row.nome.toUpperCase());

                    /**
                     * Adiciona as células nas linhas
                     */
                    tr.append(id)
                        .append(nome)
                        .append(igreja)
                        .append(sinodo)
                        .append(regiao);
                    /**
                     * Adiciona linhas na tabela
                     */
                    $('#tbody_presbiteros').append(tr);
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
            tbl_api = tbl_presbiteros.DataTable({
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

            //tbl_api.page('next').draw(false); // ? Ativa paginação !

            /**
             * Utilizado para selecionar as linhas da tabela
             */
            $('#tbody_presbiteros').off("click", "**").on('click', 'tr', function () {
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
                 * que vem do banco de dados como o id do registr
                 */
                console.log(id_row);
            });
            styleInputSearch.first().second();
        }, 1000);
    }

    instanciaDataTables(); // init function instanciaDataTables() {};

    /**
     * Traz as informações para edição
     */
    function getDataForm() {
        $.get('api/presbiteros?id=' + id_row)
            .done(function (response) {
                let data = response[0];
                cadastros_presbiteros.id_sinodo.value = data.id_sinodo;
                cadastros_presbiteros.id_presbiterio.value = data.id_presbiterio;
                cadastros_presbiteros.nome.value = data.nome;
                cadastros_presbiteros.nome_pai.value = data.nome_pai;
                cadastros_presbiteros.nome_mae.value = data.nome_mae;
                cadastros_presbiteros.nascimento_data.value = data.nascimento_data;
                cadastros_presbiteros.nascimento_id_estado.value = data.nascimento_id_estado;
                cadastros_presbiteros.rg.value = data.rg;
                cadastros_presbiteros.rg_emissor.value = data.rg_emissor;
                cadastros_presbiteros.cpf.value = data.cpf;
                cadastros_presbiteros.estado_civil.value = data.estado_civil;
                cadastros_presbiteros.conjuge_nome.value = data.conjuge_nome;
                cadastros_presbiteros.conjuge_nascimento.value = data.conjuge_nascimento;
                cadastros_presbiteros.nome_filhos.value = data.nome_filhos;
                cadastros_presbiteros.endereco.value = data.endereco;
                cadastros_presbiteros.endereco_nr.value = data.endereco_nr;
                cadastros_presbiteros.endereco_complemento.value = data.endereco_complemento;
                cadastros_presbiteros.endereco_bairro.value = data.endereco_bairro;
                cadastros_presbiteros.endereco_id_estado.value = data.endereco_id_estado;
                cadastros_presbiteros.cep.value = data.cep;
                cadastros_presbiteros.cx_postal.value = data.cx_postal;
                cadastros_presbiteros.cx_postal_cep.value = data.cx_postal_cep;
                cadastros_presbiteros.celular.value = data.celular;
                cadastros_presbiteros.telefone.value = data.telefone;
                cadastros_presbiteros.telefone_igreja.value = data.telefone_igreja;
                cadastros_presbiteros.email.value = data.email;

                /**
                 * Atribui o nome do usuario e a data no painel de registro de alterações
                 */
                $("#user_inc").text(data.user_inclusao);
                $("#data_inc").text(data.data_inclusao);
                $("#user_alt").text(data.user_alteracao);
                $("#data_alt").text(data.data_alteracao);

                /**
                 * espera um pouco depois de setar o valor para mudar o select para o valor
                 */
                setTimeout(() => {
                    $(cadastros_presbiteros.id_sinodo).trigger("change");
                    $(cadastros_presbiteros.id_presbiterio).trigger("change");
                    $(cadastros_presbiteros.nascimento_id_estado).trigger("change");
                    $(cadastros_presbiteros.endereco_id_estado).trigger("change");
                    setTimeout(() => {
                        cadastros_presbiteros.nascimento_id_cidade.value = data.nascimento_id_cidade;
                        cadastros_presbiteros.endereco_id_cidade.value = data.endereco_id_cidade;
                        console.log("data.cidade");
                        setTimeout(() => {
                            $(cadastros_presbiteros.id_cidade).trigger("change");
                            console.log("trigg cidade")
                        }, 500)
                    }, 500)
                }, 500);
            })
            .fail(function (response) {
                console.log(response);
            })
        ;
    }

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
                        $.post('/api/presbiteros/delete', {id: id_row})
                            .done(function () {
                                tbl_api.row('.active').remove().draw(false);
                                swal("Deletado!", "Seu registro foi deletado.", "success");
                                id_row = null;
                                cadastros_sinodos.reset();
                            })
                            .fail(function (response) {
                                console.log(response.responseText);
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

    /**
     * Validador do Formulario, utilizado para incluir ou editar novos registros
     * @type {*|jQuery}
     */
    let validator = $("#cadastros_presbiteros").validate({
        rules: {
            nome: {
                required: true,
                minlength: 4,
                maxlength: 255
            },
            cnpj: {
                required: true,
                minlength: 14,
                maxlength: 14
            },
            data_organizacao: {
                required: true,
                minlength: 1,
                maxlength: 10
            },
            endereco: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            endereco_nr: {
                required: true,
                minlength: 2,
                maxlength: 7
            },
            endereco_complemento: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            endereco_bairro: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            email: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            website: {
                required: true,
                minlength: 3,
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
            if (id_row > 0) {
                let form = $('#formUsuarios').serializeArray();
                form.unshift({name: 'id', value: id_row});
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                form.unshift({name: 'usuario_alteracao', value: user.id_usuario});
                form.unshift({name: 'data_alteracao', value: window.getData});
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                $.post('api/presbiteros/update', form)
                    .done(function (response) {
                        console.log(response);
                        /*tbl_api.row(tr_row).remove();
                        let regiao;
                        switch (response.regiao) {
                            case '1':
                                regiao = "CENTRO-OESTE";
                                break;
                            case '2':
                                regiao = "NORDESTE";
                                break;
                            case '3':
                                regiao = "NORTE";
                                break;
                            case '4':
                                regiao = "SUDESTE";
                                break;
                            case '5':
                                regiao = "SUL";
                                break;
                            default:
                                regiao = 'Não identificado';
                                break;
                        }
                        tbl_api.row.add([
                            response.id,
                            response.nome.toUpperCase(),
                            response.sigla.toUpperCase(),
                            regiao
                        ]).draw(false);*/

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
                            $(formUsuarios.sigla).parent().addClass("error");
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
                let form = $('#cadastros_presbiteros').serializeArray();
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                form.unshift({name: 'usuario_inclusao', value: user.ID_USUARIO});
                form.unshift({name: 'data_inclusao', value: window.getData});
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                $.post('api/presbiteros/store', form)
                    .done(function (response) {
                        console.log(response);
                        /* let regiao;
                         switch (response.regiao) {
                             case '1':
                                 regiao = "CENTRO-OESTE";
                                 break;
                             case '2':
                                 regiao = "NORDESTE";
                                 break;
                             case '3':
                                 regiao = "NORTE";
                                 break;
                             case '4':
                                 regiao = "SUDESTE";
                                 break;
                             case '5':
                                 regiao = "SUL";
                                 break;
                             default:
                                 regiao = 'Não identificado';
                                 break;
                         }
                         tbl_api.row.add([
                             response.id,
                             response.nome.toUpperCase(),
                             response.sigla.toUpperCase(),
                             regiao
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
                            $(formUsuarios.sigla).parent().addClass("error");
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


    /**
     * Os campos select do semantic não são compativeis com o jquery validation,
     * a msg fica bugada, usar desta forma para select.search.dropdown
     */
    $("#cadastros_presbiteros").form({
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
    /**
     * Ao clicar no botão limpar, reseta as classes de erro
     */
    $(".ui.reset.button").on("click", function () {
        validator.resetForm();
        $('form').form('reset')
    });

    /**
     * Adiciona evento de exclusão no botão Excluir
     */
    $("button[type='button']").on("click", function () {
        deleteData();
    });

    /**
     *  Função para ativar o get
     */
    $("a[data-tab='second']").on("click", function () {
        if (id_row > 0) {
            getDataForm();
        } else {
            /**
             * reseta os campos do tipo input
             */
            cadastros_presbiteros.reset();

            /**
             * retorna o select para a primera opção
             * @type {number}
             */
            validator_presbiteros.resetForm();
            $('form').form('reset');
        }
    });


    /***********************************************/
    /***********************************************/
    /***********************************************/


    /**
     * Carregar Estados e Cidades
     */
    let estadosLoadAtual;

    /**
     * Carregar Sínodos e Presbitérios
     */
    function loadSinodosPresbiterios() {
        $.get('api/sinodos')
            .done(function (response) {
                $.each(response, function () {
                    $(cadastros_presbiteros.id_sinodo).append(
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

        $(cadastros_presbiteros.id_sinodo).on('change', function () {
            if ($(cadastros_presbiteros.id_sinodo).val() > 0) {
                $("#id_presbiterio").children().remove();
                $("#div_presbiterio").find(".search").hide();
                $("#loader_presbiterio").show();
                $.get('api/presbiterios?sinodo=' + $(cadastros_presbiteros.id_sinodo).val())
                    .done(function (response) {

                        $.each(response, function () {
                            $(cadastros_presbiteros.id_presbiterio).append(
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

    loadSinodosPresbiterios();

    function popularEstadosCidadesAtual() {

        if (!estadosLoadAtual) {
            $.get('api/estados')
                .done(function (response) {
                    $(cadastros_presbiteros.nascimento_id_estado).append($('<option />').text('- -'));

                    $.each(response, function () {
                        $(cadastros_presbiteros.nascimento_id_estado).append(
                            $('<option />').val(this.id).text(this.uf_nome + " / " + this.nome.toUpperCase())
                        );
                    });

                    estadosLoadAtual = true;
                })
                .fail(function () {
                    iziToast.warning({
                        title: 'Erro',
                        message: 'Consulta não realizada, verifique sua conexão!',
                    });
                    estadosLoadAtual = false;
                })
            ;
        }

        /**
         * @description Popular a Aba Cadastrar, Naturalidade
         */
        $(cadastros_presbiteros.nascimento_id_estado).on('change', function () {
            if ($(cadastros_presbiteros.nascimento_id_estado).val() > 0) {
                $("#nascimento_id_cidade").children().remove();
                $("#div_cidade").find(".search").hide();
                $("#loader_cidade").show();
                $.get('api/cidades?uf=' + $(cadastros_presbiteros.nascimento_id_estado).val())
                    .done(function (response) {

                        $.each(response, function () {
                            $(cadastros_presbiteros.nascimento_id_cidade).append(
                                $('<option />').val(this.id).text(this.nome.toUpperCase())
                            );
                        });
                        $("#div_cidade").find(".search").show();
                        $("#loader_cidade").hide()
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

    popularEstadosCidadesAtual();


    /***********************************************/
    /***********************************************/
    /***********************************************/

    /**
     * Carregar Estados e Cidades
     */
    let estadosLoad;

    function popularEstadosCidades() {

        if (!estadosLoad) {
            $.get('api/estados')
                .done(function (response) {
                    $(cadastros_presbiteros.endereco_id_estado).append($('<option />').text('- -'));

                    $.each(response, function () {
                        $(cadastros_presbiteros.endereco_id_estado).append(
                            $('<option />').val(this.id).text(this.uf_nome + " / " + this.nome.toUpperCase())
                        );
                    });

                    estadosLoad = true;
                })
                .fail(function () {
                    iziToast.warning({
                        title: 'Erro',
                        message: 'Consulta não realizada, verifique sua conexão!',
                    });
                    estadosLoad = false;
                })
            ;
        }

        /**
         * @description Popular a Aba Cadastrar, Naturalidade
         */
        $(cadastros_presbiteros.endereco_id_estado).on('change', function () {
            if ($(cadastros_presbiteros.endereco_id_estado).val() > 0) {
                $("#endereco_id_cidade").children().remove();
                $("#div_cidade").find(".search").hide();
                $("#loader_cidade").show();
                $.get('api/cidades?uf=' + $(cadastros_presbiteros.endereco_id_estado).val())
                    .done(function (response) {

                        $.each(response, function () {
                            $(cadastros_presbiteros.endereco_id_cidade).append(
                                $('<option />').val(this.id).text(this.nome.toUpperCase())
                            );
                        });
                        $("#div_cidade").find(".search").show();
                        $("#loader_cidade").hide()
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

    popularEstadosCidades();


    /**
     * Verifica Sessão do usuário
     *   para ser enviado junto ao array form
     * @type {string}
     */
    /*let user = btoa("user-data");
    user = sessionStorage.getItem(user);
    user = atob(user);
    user = JSON.parse(user);*/
});