let id_row, tr_row, tableUsuarios, tbl_api;
tableUsuarios = $("#tableUsuarios");
$(document).ready(function () {
    /**
     * Estilizar o input de pesquisar do
     * @type {{first: first, second: second}}
     */
    let styleInputSearch = {
        first: function () {
            setTimeout(() => {
                $("input[type='search']").parent().addClass("ui icon input");
                $("input[type='search']").css("width", "220px");
                $("input[type='search']").css("margin-left", "10px");
            }, 500);
            return styleInputSearch;
        },
        second: function () {
            setTimeout(() => {
                $("input[type='search']").after("<i class='search icon'>");
            }, 1000);
            return styleInputSearch;
        }
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

    function getDataSinodos() {
        $.get('api/sinodos')
            .done(function (response) {
                $(formUsuarios.id_sinodo).append($('<option />').text('- -'));

                $.each(response, function () {
                    $(formUsuarios.id_sinodo).append(
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
        $(formUsuarios.id_sinodo).on('change', function () {
            if ($(formUsuarios.id_sinodo).val() > 0) {
                $("select[name='id_presbiterio']").children().remove();
                $("#div_presbiterio").find(".search").hide();
                $("#loader_presbiterio").show();
                $.get('api/presbiterios?sinodo=' + $(formUsuarios.id_sinodo).val())
                    .done(function (response) {
                        $(formUsuarios.id_presbiterio).append($('<option />').text('- -'));
                        $.each(response, function () {
                            $(formUsuarios.id_presbiterio).append(
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
        $(formUsuarios.id_presbiterio).on('change', function () {
            if ($(formUsuarios.id_presbiterio).val() > 0) {
                $("select[name='id_igreja']").children().remove();
                $("#div_igreja").find(".search").hide();
                $("#loader_igreja").show();
                $.get('api/igrejas?presbiterio=' + $(formUsuarios.id_presbiterio).val())
                    .done(function (response) {
                        $(formUsuarios.id_igreja).append($('<option />').text('- -'));

                        $.each(response, function () {
                            $(formUsuarios.id_igreja).append(
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

    function getDataPresbitero() {
        $(formUsuarios.id_presbiterio).on('change', function () {
            if ($(formUsuarios.id_igreja).val() > 0) {
                $("select[name='id_presbitero']").children().remove();
                $("#div_presbitero").find(".search").hide();
                $("#loader_presbitero").show();
                $.get('api/presbiteros?igreja=' + $(formUsuarios.id_igreja).val())
                    .done(function (response) {
                        $(formUsuarios.id_presbitero).append($('<option />').text('- -'));

                        $.each(response, function () {
                            $(formUsuarios.id_presbitero).append(
                                $('<option />').val(this.id).text(this.nome.toUpperCase())
                            );
                        });

                        $("#div_presbitero").find(".search").show();
                        $("#loader_presbitero").hide()
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

    getDataPresbitero();

    /**
     * Instancia DataTables() e organiza os eventos do click
     */
    function instanciaDataTables() {
        setTimeout(function () {
            tbl_api = tableUsuarios.DataTable({
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
            $('#tbodyUsuarios').off("click", "**").on('click', 'tr', function () {
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
            styleInputSearch.first().second();
        }, 1000);
    }

    /**
     * Popular a Tabela com infos do banco
     */
    function getDataTable() {
        $.get('/api/usuarios')
            .done(function (response) {
                for (let key in response) {
                    let tr, row, id, nome, email, perfil, nivel, status;
                    tr = $('<tr/>');
                    row = response[key];
                    /**
                     * Adiciona células com as informações do banco de dados
                     * @type {jQuery}
                     */
                    id = $('<td/>').html(row.id);
                    nome = $('<td/>').html(row.nome.toUpperCase());
                    email = $('<td/>').html(row.email.toUpperCase());
                    switch (row.perfil) {
                        case '1':
                            perfil = $('<td/>').html("SEC. IGREJA");
                            break;
                        case '2':
                            perfil = $('<td/>').html("SEC. PRESBITÉRIO");
                            break;
                        case '3':
                            perfil = $('<td/>').html("SEC. SÍNODO");
                            break;
                        case '4':
                            perfil = $('<td/>').html("SEC. SUPREMO");
                            break;
                        case '5':
                            perfil = $('<td/>').html("SUPERV. GERAL");
                            break;
                        default:
                            perfil = $('<td/>').html('Não identificado');
                            break;
                    }
                    switch (row.nivel) {
                        case '0':
                            nivel = $('<td/>').html("COMUM");
                            break;
                        case '1':
                            nivel = $('<td/>').html("SUPERIOR");
                            break;
                        default:
                            nivel = $('<td/>').html('Não identificado');
                            break;
                    }
                    switch (row.status) {
                        case '0':
                            status = $('<td/>', {'class': 'center aligned'}).append($("<i/>", {'class': 'ban icon red '}));
                            break;
                        case '1':
                            status = $('<td/>', {'class': 'center aligned'}).append($("<i/>", {'class': 'check icon green '}));
                            break;
                        default:
                            status = $('<td/>').html('Não identificado');
                            break;
                    }

                    /**
                     * Adiciona as células nas linhas
                     */
                    tr.append(id)
                        .append(nome)
                        .append(email)
                        .append(perfil)
                        .append(nivel)
                        .append(status);
                    /**
                     * Adiciona linhas na tabela
                     */
                    $('#tbodyUsuarios').append(tr);
                }
                instanciaDataTables(); // init function instanciaDataTables() {};
            })
            .fail(function (response) {
                console.log(response);
            })
        ;
    }

    getDataTable();

    /**
     * Traz as informações para edição
     */
    function getDataForm() {
        $.get('api/usuarios?id=' + id_row)
            .done(function (response) {
                let data = response[0];
                formUsuarios.nome.value = data.nome;
                formUsuarios.email.value = data.email;
                formUsuarios.cpf.value = data.cpf;
                formUsuarios.observacoes.value = data.observacoes;

                /**
                 * espera um pouco depois de setar o valor para mudar o select para o valor
                 */
                setTimeout(() => {
                    $(formUsuarios.regiao).trigger("change");
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
                        $.post('/api/usuarios/delete', {id: id_row})
                            .done(function () {
                                tbl_api.row('.active').remove().draw(false);
                                swal("Deletado!", "Seu registro foi deletado.", "success");
                                id_row = null;
                                formUsuarios.reset();
                                validator.resetForm();
                                $('form').form('reset');
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
    /*let validator = $("#formUsuarios").validate({
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
        submitHandler: function () {
            if (id_row > 0) {
                let form = $('#formUsuarios').serializeArray();
                form.unshift({name: 'id', value: id_row});
                $.post('api/usuarios/update', form)
                    .done(function (response) {
                        console.log(response);
                        tbl_api.row(tr_row).remove();
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
                let form = $('#formUsuarios').serializeArray();
                $.post('api/usuarios/store', form)
                    .done(function (response) {
                        console.log(response);
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
    });*/

    /**
     * Os campos select do semantic não são compativeis com o jquery validation,
     * a msg fica bugada, usar desta forma para select.search.dropdown
     */
    $("#formUsuarios").form({
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
        //validator.resetForm();
        $('form').form('reset');
    });

    /**
     * Adiciona evento de exclusão no botão Excluir
     */
    $("button[type='button']").on("click", function () {
        //deleteData();
    });

    /**
     * Função para quando for na aba lista, zerar o id_row
     */
    $("a[data-tab='first']").on("click", function () {
        if (id_row > 0) {
            id_row = null;
            tbl_api.row().deselect();
            tbl_api.$('tr.active').removeClass('active');
        }
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
            formUsuarios.reset();

            /**
             * retorna o select para a primera opção
             * @type {number}
             */
            //validator.resetForm();
            $('form').form('reset');
        }
    });

});