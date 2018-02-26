let id_row, tr_row, tbl_igrejas, tbl_api;
tbl_igrejas = $("#tbl_igrejas");

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
        $.get('/api/igrejas')
            .done(function (response) {
                for (let key in response) {
                    let tr, row, id, nome, presbiterio, sinodo;
                    tr = $('<tr/>');
                    row = response[key];
                    /**
                     * Adiciona células com as informações do banco de dados
                     * @type {jQuery}
                     */
                    id = $('<td/>').html(row.id);
                    nome = $('<td/>').html(row.nome);
                    presbiterio = $('<td/>').html(row.presbiterio);
                    sinodo = $('<td/>').html(row.sinodo);
                    /**
                     * Adiciona as células nas linhas
                     */
                    tr.append(id)
                        .append(nome)
                        .append(presbiterio)
                        .append(sinodo);
                    /**
                     * Adiciona linhas na tabela
                     */
                    $('#tbody_igrejas').append(tr);
                }
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

    /**
     * Instancia DataTables() e organiza os eventos do click
     */
    function instanciaDataTables() {
        setTimeout(function () {
            tbl_api = tbl_igrejas.DataTable({
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
            $('#tbody_igrejas').off("click", "**").on('click', 'tr', function () {
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
        }, 1000);
    }

    instanciaDataTables(); // init function instanciaDataTables() {};

    /**
     * Traz as informações para edição
     */
    function getDataForm() {
        $.get('api/igrejas?id=' + id_row)
            .done(function (response) {
                let data = response[0];
                cadastros_igrejas.nome.value = data.nome;
                cadastros_igrejas.sigla.value = data.sigla;
                cadastros_igrejas.regiao.value = data.regiao;

                /**
                 * espera um pouco depois de setar o valor para mudar o select para o valor
                 */
                setTimeout(() => {
                    $(cadastros_igrejas.regiao).trigger("change");
                }, 500);
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
                        $.post('/api/igrejas/delete', {id: id_row})
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
    let validator_igrejas = $("#cadastros_igrejas").validate({
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
        invalidHandler: function () {
            alert("invelid handler");
        },
        submitHandler: function () {
            alert("submit handler");
        }
    });

    let validator_congregacoes = $("#cadastros_congregacoes").validate({
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
        invalidHandler: function () {
            alert("invelid handler");
        },
        submitHandler: function () {
            alert("submit handler");
        }
    });

    /**
     * Os campos select do semantic não são compativeis com o jquery validation,
     * a msg fica bugada, usar desta forma para select.search.dropdown
     */
    $("#cadastros_igrejas").form({
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
    })

    /**
     * Adiciona evento de exclusão no botão Excluir
     */
    $("button[type='button']").on("click", function () {
        deleteData();
    });


    let estadosLoad;

    function popularEstadosCidades() {

        if (!estadosLoad) {
            $.get('api/estados')
                .done(function (response) {
                    $(cadastros_igrejas.id_estado).append($('<option />').text('Selecione o Estado'));

                    $.each(response, function () {
                        $(cadastros_igrejas.id_estado).append(
                            $('<option />').val(this.id).text(this.uf_nome + " / " + this.nome.toUpperCase())
                        );
                    });

                    estadosLoad = true;
                })
                .fail(function (response) {
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
        $(cadastros_igrejas.id_estado).on('change', function () {
            if ($(cadastros_igrejas.id_estado).val() > 0) {
                $("#id_cidade").children().remove();
                $("#div_cidade").find(".search").hide();
                $(".loader").show();
                $.get('api/cidades?uf=' + $(cadastros_igrejas.id_estado).val())
                    .done(function (response) {

                        $.each(response, function () {
                            $(cadastros_igrejas.id_cidade).append(
                                $('<option />').val(this.id).text(this.nome.toUpperCase())
                            );
                        });
                        $("#div_cidade").find(".search").show();
                        $(".loader").hide()
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
    setTimeout(function () {
        cadastros_igrejas.id_estado.value = 11;
        $(cadastros_igrejas.id_estado).trigger("change");
    }, 500);

    setTimeout(function () {
        cadastros_igrejas.id_cidade.value = 4271;
        $(cadastros_igrejas.id_cidade).trigger("change");
    }, 1000);
});