let id_row, tr_row, tbl_presbiteros, tbl_api;
tbl_presbiteros = $("#tbl_presbiteros");

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
        $.get('/api/presbiteros')
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
                    $('#tbody_presbiteros').append(tr);
                }
            })
            .fail(function (response) {
                console.log(response);
            })
        ;
    }

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

            tbl_api.page('next').draw(false); // ? Ativa paginação !

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
                cadastros_presbiteros.nome.value = data.nome;
                cadastros_presbiteros.sigla.value = data.sigla;
                cadastros_presbiteros.regiao.value = data.regiao;

                /**
                 * espera um pouco depois de setar o valor para mudar o select para o valor
                 */
                setTimeout(() => {
                    $(cadastros_presbiteros.regiao).trigger("change");
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
    let validator_presbiteros = $("#cadastros_presbiteros").validate({
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
        validator_presbiteros.resetForm();
        $('form').form('reset')
    });

    /**
     * Adiciona evento de exclusão no botão Excluir
     */
    $("button[type='button']").on("click", function () {
        deleteData();
    });
});