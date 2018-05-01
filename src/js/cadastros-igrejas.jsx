let id_row, id_row_cong, tr_row, tbl_igrejas, tbl_api;
tbl_igrejas = $("#tbl_igrejas");

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
                    nome = $('<td/>').html(row.nome.toUpperCase());
                    presbiterio = $('<td/>').html(row.presbiterio.sigla.toUpperCase());
                    sinodo = $('<td/>').html(row.presbiterio.sinodo.sigla.toUpperCase());
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

    getDataTable();

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
            styleInputSearch.first().second();
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
                console.log('getdataForm');
                console.log(id_row);
                console.log(data);
                cadastros_igrejas.id_sinodo.value = data.presbiterio.sinodo.id;
                cadastros_igrejas.id_estado.value = data.id_estado;
                cadastros_igrejas.cnpj.value = data.cnpj;
                cadastros_igrejas.nome.value = data.nome;
                cadastros_igrejas.data_organizacao.value = data.data_organizacao;
                cadastros_igrejas.endereco.value = data.endereco;
                cadastros_igrejas.endereco_numero.value = data.endereco_numero;
                cadastros_igrejas.endereco_complemento.value = data.endereco_complemento;
                cadastros_igrejas.endereco_bairro.value = data.endereco_bairro;
                cadastros_igrejas.email.value = data.email;
                //cadastros_igrejas.homepage.value = data.homepage;

                /**
                 * espera um pouco depois de setar o valor para mudar o select para o valor
                 */
                setTimeout(() => {
                    $(cadastros_igrejas.id_sinodo).trigger("change");
                    $(cadastros_igrejas.id_estado).trigger("change");
                    setTimeout(() => {
                        cadastros_igrejas.id_presbiterio.value = data.presbiterio.id;
                        cadastros_igrejas.id_cidade.value = data.id_cidade;
                        setTimeout(() => {
                            $(cadastros_igrejas.id_cidade).trigger("change");
                            $(cadastros_igrejas.id_presbiterio).trigger("change");
                        }, 500)
                    }, 500)
                }, 500);


                /**
                 * Atribui o nome do usuario e a data no painel de registro de alterações
                 */
                $("#user_inc").text(data.user_inclusao);
                $("#data_inc").text(data.data_inclusao);
                $("#user_alt").text(data.user_alteracao);
                $("#data_alt").text(data.data_alteracao);
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
                minlength: 10,
                maxlength: 20
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
            if (id_row > 0) {
                let form = $('#cadastros_igrejas').serializeArray();
                form.unshift({name: 'id', value: id_row});
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                //form.unshift({name: 'usuario_alteracao', value: user.ID_USUARIO});
                //form.unshift({name: 'data_alteracao', value: window.getData});
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                $.post('api/igrejas/update', form)
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
                            $(cadastros_igrejas.sigla).parent().addClass("error");
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
                let form = $('#cadastros_igrejas').serializeArray();
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                //form.unshift({name: 'usuario_inclusao', value: user.ID_USUARIO});
                //form.unshift({name: 'data_inclusao', value: window.getData});
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                $.post('api/igrejas/store', form)
                    .done(function (response) {
                        console.log(response);

                        tbl_api.row.add([
                            response.id,
                            response.nome.toUpperCase(),
                            response.presbiterio.toUpperCase(),
                            response.sinodo.toUpperCase()
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
                            $(cadastros_igrejas.sigla).parent().addClass("error");
                            iziToast.error({
                                title: 'Erro',
                                message: 'Atenção, CNPJ já existe.',
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

    let validator_congregacoes = $("#cadastros_congregacoes").validate({
        rules: {
            nome: {
                required: true,
                minlength: 4,
                maxlength: 255
            },
            cnpj: {
                required: true,
                minlength: 10,
                maxlength: 20
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
            if (id_row_cong > 0) {
                let form = $('#cadastros_congregacoes').serializeArray();
                form.unshift({name: 'id', value: id_row_cong});
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                form.unshift({name: 'usuario_alteracao', value: user.ID_USUARIO});
                form.unshift({name: 'data_alteracao', value: window.getData});
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                $.post('api/usuarios/update', form)
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
                            $(cadastros_congregacoes.sigla).parent().addClass("error");
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
                let form = $('#cadastros_congregacoes').serializeArray();
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                form.unshift({name: 'usuario_inclusao', value: user.ID_USUARIO});
                form.unshift({name: 'data_inclusao', value: window.getData});
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                $.post('api/usuarios/store', form)
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
                            $(cadastros_congregacoes.sigla).parent().addClass("error");
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
    });

    /**
     * Adiciona evento de exclusão no botão Excluir
     */
    $("button[type='button']").on("click", function () {
        deleteData();
    });

    /**
     * Carregar Estados e Cidades
     */
    let estadosLoad;

    function popularEstadosCidades() {

        if (!estadosLoad) {
            $.get('api/estados')
                .done(function (response) {
                    $(cadastros_igrejas.id_estado).append($('<option />').text('- -'));

                    $.each(response, function () {
                        $(cadastros_igrejas.id_estado).append(
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
        $(cadastros_igrejas.id_estado).on('change', function () {
            if ($(cadastros_igrejas.id_estado).val() > 0) {
                $("#id_cidade").children().remove();
                $("#div_cidade").find(".search").hide();
                $("#loader_cidade").show();
                $.get('api/cidades?uf=' + $(cadastros_igrejas.id_estado).val())
                    .done(function (response) {

                        $.each(response, function () {
                            $(cadastros_igrejas.id_cidade).append(
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
     * Carregar Sínodos e Presbitérios
     */
    function loadSinodosPresbiterios() {
        $.get('api/sinodos')
            .done(function (response) {
                $.each(response, function () {
                    $(cadastros_igrejas.id_sinodo).append(
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

        $(cadastros_igrejas.id_sinodo).on('change', function () {
            if ($(cadastros_igrejas.id_sinodo).val() > 0) {
                $("#id_presbiterio").children().remove();
                $("#div_presbiterio").find(".search").hide();
                $("#loader_presbiterio").show();
                $.get('api/presbiterios?sinodo=' + $(cadastros_igrejas.id_sinodo).val())
                    .done(function (response) {

                        $.each(response, function () {
                            $(cadastros_igrejas.id_presbiterio).append(
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
            cadastros_igrejas.reset();
            validator_congregacoes.reset();

            /**
             * retorna o select para a primera opção
             * @type {number}
             */
            validator_igrejas.resetForm();
            validator_congregacoes.resetForm();
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
});