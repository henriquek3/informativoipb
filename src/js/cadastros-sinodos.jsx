let id_row, tr_row, tbl_sinodos, tbl_api;
tbl_sinodos = $("#tbl_sinodos");

$(document).ready(function () {
    $.validator.setDefaults({
        debug: true,
        //jquery-validator has a panic attack about the search element not having a name tag.
        ignore: ".search",
        submitHandler: function () {
            //$.blockUI({message: '<div id="parent"><div id="loaderIcon" class="loader"></div><div id="loaderText" >Working on it....</div></div>'});
            return false;
        }
    });

    // cria o sidebar e adiciona um evento ao botão
    $('.menu .item').tab();

    // Instancia o datepicker e atribui definições https://uxsolutions.github.io/bootstrap-datepicker/
    $(".datepicker2").datepicker({
        todayBtn: "linked",
        daysOfWeekHighlighted: "0,6",
        autoclose: true,
        todayHighlight: true,
        language: "pt-BR"
    });

    // Instancia o search do dropdown semantic-ui
    $('.ui.dropdown').dropdown();

    // Popular a Tabela com infos do banco
    function getDataTable() {
        $.get('/api/sinodos')
            .done(function (response) {
                for (let key in response) {
                    let tr, row, id, tipo, inicio, fim;
                    tr = $('<tr/>');
                    row = response[key];
                    id = $('<td/>').html(row.id);
                    inicio = $('<td/>').html(row.inicio);
                    fim = $('<td/>').html(row.fim);
                    switch (row.tipo_afastamento) {
                        case '1':
                            tipo = $('<td/>').html('AFASTAMENTO');
                            break;
                        case '2':
                            tipo = $('<td/>').html('ADVERTÊNCIA');
                            break;
                        case '3':
                            tipo = $('<td/>').html('FALTA');
                            break;
                        case '4':
                            tipo = $('<td/>').html('AVISO PRÉVIO');
                            break;
                        case '5':
                            tipo = $('<td/>').html('CONTRATO EXPERIÊNCIA');
                            break;
                        case '6':
                            tipo = $('<td/>').html('INSS - AUXÍLIO DOENÇA');
                            break;
                        case '7':
                            tipo = $('<td/>').html('INSS - ACIDENTE DE TRABALHO');
                            break;
                        default:
                            tipo = $('<td/>').html('Não identificado');
                            break;
                    }

                    tr.append(id)
                        .append(tipo)
                        .append(inicio)
                        .append(fim);

                    $('#tbody_sinodos').append(tr);
                }
            })
            .fail(function (response) {
                console.log(response);
            })
        ;
    }

    // Instancia DataTables() e organiza os eventos do click
    function instanciaDataTables() {
        setTimeout(function () {
            tbl_api = tbl_sinodos.DataTable({
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

            tbl_api.page('next').draw(false);
            $('#tbody_sinodos').off("click", "**").on('click', 'tr', function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                    id_row = null;
                } else {
                    tbl_api.$('tr.active').removeClass('active');
                    $(this).addClass('active');
                    id_row = $(this).find('td:first').html();
                    tr_row = $(this);
                }
                console.log(id_row);
            });
        }, 1000);
    }

    instanciaDataTables();

    // Traz as informações para edição
    function getDataForm() {
        $.get('api/sinodos?id=' + id_row)
            .done(function (response) {
                let data = response[0];
                cadastros_sinodos.tipo_afastamento.value = data.tipo_afastamento;
                cadastros_sinodos.inicio.value = data.inicio;
                cadastros_sinodos.fim.value = data.fim;
                cadastros_sinodos.observacoes.value = data.observacoes;

                setTimeout(() => {
                    $(cadastros_sinodos.tipo_afastamento).trigger("change");
                }, 500);

                $("#lista-sinodos").removeClass('active in');
                $("#tab_sinodos_lista").parent().removeClass('active');

                $("#tab_sinodos_cadastrar").parent().addClass('active');
                $("#cadastrar-sinodos").addClass('active in');
            })
            .fail(function (response) {
                console.log(response);
            })
        ;
    }

    // Exclui as informações do banco de dados
    function deleteData() {
        if (id_row > 0) {
            swal({
                    title: "Você tem certeza disso?",
                    text: "Uma vez deletado, não há como desfazer!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim, delete isto!",
                    showLoaderOnConfirm: true,
                    closeOnConfirm: false
                },
                function () {
                    $.post('/api/sinodos/delete', {id: id_row})
                        .done(function () {
                            tbl_api.row('.info').remove().draw(false);
                            swal("Deletado!", "Seu registro foi deletado.", "success");
                            id_row = null;
                            cadastros_sinodos.reset();
                            $("#tab_sinodos_lista").click();
                        })
                        .fail(function (response) {
                            console.log(response.responseText);
                            swal("Erro!", response.responseText, "error");
                        })
                    ;
                })
            ;
        } else {
            tbl_sinodos.effect('shake');
            return false;
        }
    }

    // Validador do Formulario, utilizado para incluir ou editar novos registros
    let validator = $("#cadastros_sinodos").validate({
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
            alert("submit handler");
        }
    });

    // Os campos select do semantic não são compativeis com o jquery validation, a msg fica bugada, usar desta forma para select.search.dropdown
    $("#cadastros_sinodos").form({
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

    // Ao clicar no botão limpar, reseta as classes de erro
    $(".ui.reset.button").on("click", function () {
        validator.resetForm();
        $('form').form('reset')
    })
});