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
        $(formUsuarios.id_igreja).on('change', function () {
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
                    .fail(function () {
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

            //tbl_api.page('next').draw(false); // ? Ativa paginação !

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
                //console.log(response);
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
                        case 1:
                            perfil = $('<td/>').html("SEC. IGREJA");
                            break;
                        case 2:
                            perfil = $('<td/>').html("SEC. PRESBITÉRIO");
                            break;
                        case 3:
                            perfil = $('<td/>').html("SEC. SÍNODO");
                            break;
                        case 4:
                            perfil = $('<td/>').html("SEC. SUPREMO");
                            break;
                        case 5:
                            perfil = $('<td/>').html("SUPERV. GERAL");
                            break;
                        default:
                            perfil = $('<td/>').html('Não identificado');
                            break;
                    }
                    switch (row.nivel) {
                        case 0:
                            nivel = $('<td/>').html("COMUM");
                            break;
                        case 1:
                            nivel = $('<td/>').html("SUPERIOR");
                            break;
                        default:
                            nivel = $('<td/>').html('Não identificado');
                            break;
                    }
                    switch (row.status) {
                        case 0:
                            status = $('<td/>', {'class': 'center aligned'}).append($("<i/>", {'class': 'ban icon red '}));
                            break;
                        case 1:
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
        $.get('api/usuarios/' + id_row + '/edit')
            .done(function (response) {
                let data = response;
                //console.log(data);
                formUsuarios.nome.value = data.nome;
                formUsuarios.email.value = data.email;
                formUsuarios.cpf.value = data.cpf;
                formUsuarios.id_sinodo.value = data.id_sinodo;
                $(formUsuarios.id_sinodo).trigger("change");
                // - formUsuarios.id_presbiterio.value = data.id_presbiterio;
                //formUsuarios.id_igreja.value = data.id_igreja;
                //formUsuarios.id_presbitero.value = data.id_presbitero;
                formUsuarios.status.value = data.status;
                formUsuarios.nivel.value = data.nivel;
                formUsuarios.perfil.value = data.perfil;
                formUsuarios.observacoes.value = data.observacoes;


                $("#user_inc").text(data.user_inclusao);
                $("#data_inc").text(data.data_inclusao);
                $("#user_alt").text(data.user_alteracao);
                $("#data_alt").text(data.data_alteracao);

                /**
                 * espera um pouco depois de setar o valor para mudar o select para o valor
                 */
                setTimeout(() => {
                    formUsuarios.id_presbiterio.value = data.id_presbiterio;
                    $(formUsuarios.id_presbiterio).trigger("change");
                    $(formUsuarios.status).trigger("change");
                    $(formUsuarios.nivel).trigger("change");
                    $(formUsuarios.perfil).trigger("change");
                    setTimeout(() => {
                        formUsuarios.id_igreja.value = data.id_igreja;
                        $(formUsuarios.id_igreja).trigger("change");
                        setTimeout(() => {
                            formUsuarios.id_presbitero.value = data.id_igreja;
                            $(formUsuarios.id_presbitero).trigger("change");
                        }, 100)
                    }, 100)
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
    let validator = $("#formUsuarios").validate({
        rules: {
            nome: {
                required: true,
                minlength: 6,
                maxlength: 128
            },
            email: {
                required: true,
                maxlength: 64
            },
            cpf: {
                required: true
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
                $('#formUsuarios').append('<input type="hidden" name="_method" value="put">');
                let form = $('#formUsuarios').serializeArray();
                $.post('api/usuarios/' + id_row + '/edit', form)
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
                let form = $('#formUsuarios').serializeArray();
                $.post('/api/usuarios', form)
                    .done(function (response) {
                        id_row = response.id;
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
                    })
                ;
            }
        }
    });

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
    $("button[type='reset']").on("click", function () {
        validator.resetForm();
        formUsuarios.reset();
        $('form').form('reset');
        id_row = null;
        $(formUsuarios._method).remove();
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
            validator.resetForm();
            $('form').form('reset');
        }
    });

    /**
     * Verifica Sessão do usuário
     *   para ser enviado junto ao array form
     * @type {string}
     */
    /*let user = btoa("user-data");
    user = sessionStorage.getItem(user);
    user = atob(user);
    user = JSON.parse(user);*/

    $(formDelete).on("submit", function () {
        let form = $(formDelete).serializeArray();
        $.post('/api/usuarios/' + id_row, form)
            .done(function (r) {
                /*console.log("done");
                console.log(r)*/
            })
            .fail(function (r) {
                console.log("fail");
                console.log(r)
            })
        ;
        console.log("id :" + id_row);
        return false;
    });


    /**
     * Jquery Mask
     */
    $("input[name='cpf']").mask('000.000.000-00', {reverse: true});

    $("input[name='cpf']").focusout(function () {
        if (CPF.validate($("input[name='cpf']").val())) {
            iziToast.success({
                title: 'Verificado!',
                message: 'O CPF informado é válido!',
                timeout: 5000,
                pauseOnHover: true,
                position: 'topRight',
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOutUp'
            });
        } else {
            iziToast.warning({
                title: 'Atenção! ',
                message: 'O CPF informado é inválido!',
                timeout: 10000,
                pauseOnHover: true,
                position: 'topRight',
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOutUp'
            });
        }
    });
});