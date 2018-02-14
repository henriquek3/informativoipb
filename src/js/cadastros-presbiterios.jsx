let id_row, tr_row, tbl_presbiterios, tbl_api;
tbl_presbiterios = $("#tbl_presbiterios");

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
                    let tr, row, id, regiao, nome, sigla;
                    tr = $('<tr/>');
                    row = response[key];
                    /**
                     * Adiciona células com as informações do banco de dados
                     * @type {jQuery}
                     */
                    id = $('<td/>').html(row.id);
                    nome = $('<td/>').html(row.nome);
                    sigla = $('<td/>').html(row.sigla);
                    switch (row.regiao) {
                        case '1':
                            regiao = $('<td/>').html("CENTRO-OESTE");
                            break;
                        case '2':
                            regiao = $('<td/>').html("NORDESTE");
                            break;
                        case '3':
                            regiao = $('<td/>').html("NORTE");
                            break;
                        case '4':
                            regiao = $('<td/>').html("SUDESTE");
                            break;
                        case '5':
                            regiao = $('<td/>').html("SUL");
                            break;
                        default:
                            regiao = $('<td/>').html('Não identificado');
                            break;
                    }
                    /**
                     * Adiciona as células nas linhas
                     */
                    tr.append(id)
                        .append(nome)
                        .append(sigla)
                        .append(regiao);
                    /**
                     * Adiciona linhas na tabela
                     */
                    $('#tbody_presbiterios').append(tr);
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
            tbl_api = tbl_presbiterios.DataTable({
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
     * Traz as informações para edição
     */
    function getDataForm() {
        $.get('api/presbiterios?id=' + id_row)
            .done(function (response) {
                let data = response[0];
                cadastros_presbiterios.nome.value = data.nome;
                cadastros_presbiterios.sigla.value = data.sigla;
                cadastros_presbiterios.regiao.value = data.regiao;

                /**
                 * espera um pouco depois de setar o valor para mudar o select para o valor
                 */
                setTimeout(() => {
                    $(cadastros_presbiterios.regiao).trigger("change");
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
                        $.post('/api/presbiterios/delete', {id: id_row})
                            .done(function () {
                                tbl_api.row('.active').remove().draw(false);
                                swal("Deletado!", "Seu registro foi deletado.", "success");
                                id_row = null;
                                cadastros_sinodos.reset();
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

    /**
     * Validador do Formulario, utilizado para incluir ou editar novos registros
     * @type {*|jQuery}
     */
    let validator_presbiterios = $("#cadastros_presbiterios").validate({
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
                let form = $('#cadastros_presbiterios').serializeArray();
                form.unshift({name: 'id', value: id_row});
                $.post('api/presbiterios/update', form)
                    .done(function (response) {
                        tbl_api.row(tr_row).remove();

                        tbl_api.row.add([response.id, response.nome.toUpperCase(), response.id_empresa.toUpperCase(), response.cnpj.toUpperCase()]).draw(false);
                        $.notify({
                            title: "Status OK!<br/>",
                            message: 'Registro Alterado com sucesso!',
                            icon: 'fa fa-check'
                        }, {
                            type: "success"
                        });
                    })
                    .fail(function (response) {
                        console.log(response);
                        $.notify({
                            title: 'Operação não efetuada.<br/>',
                            message: 'Erro: ' + response.status + ', ' + response.statusText
                        }, {
                            type: "danger",
                            delay: 10000
                        });
                    })
                ;
            } else {
                let form = $('#cadastros_presbiterios').serializeArray();
                $.post('api/presbiterios/store', form)
                    .done(function (response) {
                        console.log(response);

                        setTimeout(function () {
                            $('input.error').parent().removeClass('has-error');
                            $('input.valid').parent().removeClass('has-success');
                        }, 600);

                        tbl_api.row.add([response.id, response.nome.toUpperCase(), response.id_empresa.toUpperCase(), response.cnpj.toUpperCase()]).draw(false);

                        $.notify({
                            title: "Status OK!<br/>",
                            message: 'Registro inserido com sucesso!',
                            icon: 'fa fa-check'
                        }, {
                            type: "success"
                        });
                    })
                    .fail(function (response) {
                        console.log(response);
                        $.notify({
                            title: 'Operação não efetuada.<br/>',
                            message: 'Erro: ' + response.status + ', ' + response.statusText
                        }, {
                            type: "danger",
                            delay: 10000
                        });
                    })
                ;
            }
        }
    });

    /**
     * Os campos select do semantic não são compativeis com o jquery validation,
     * a msg fica bugada, usar desta forma para select.search.dropdown
     */
    $("#cadastros_presbiterios").form({
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
        validator_presbiterios.resetForm();
        $('form').form('reset')
    });

    /**
     * Adiciona evento de exclusão no botão Excluir
     */
    $("button[type='button']").on("click", function () {
        deleteData();
    });
});