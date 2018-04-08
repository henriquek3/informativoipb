let id_row, tr_row, tbl_sinodos, tbl_api;
tbl_sinodos = $("#tbl_sinodos");

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

    /**
     * Instancia DataTables() e organiza os eventos do click
     */
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

            tbl_api.page('next').draw(false); // ? Ativa paginação !

            /**
             * Utilizado para selecionar as linhas da tabela
             */
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
        $.get('/api/sinodos')
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
                    nome = $('<td/>').html(row.nome.toUpperCase());
                    sigla = $('<td/>').html(row.sigla.toUpperCase());
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
                    $('#tbody_sinodos').append(tr);
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
        $.get('api/sinodos?id=' + id_row)
            .done(function (response) {
                let data = response[0];
                cadastros_sinodos.nome.value = data.nome;
                cadastros_sinodos.sigla.value = data.sigla;
                cadastros_sinodos.regiao.value = data.regiao;

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
                    $(cadastros_sinodos.regiao).trigger("change");
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
        if ( id_row > 0 ) {
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
                        $.post('/api/sinodos/delete', {id: id_row})
                            .done(function () {
                                tbl_api.row('.active').remove().draw(false);
                                swal("Deletado!", "Seu registro foi deletado.", "success");
                                id_row = null;
                                cadastros_sinodos.reset();
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
        submitHandler: function () {
            if (id_row > 0) {
                let form = $('#cadastros_sinodos').serializeArray();
                form.unshift({name: 'id', value: id_row});

                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                form.unshift({name: 'usuario_alteracao', value: user.id_usuario});
                form.unshift({name: 'data_alteracao', value: window.getData});
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */

                $.post('api/sinodos/update', form)
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
                        if (result > 0 ) {
                            $(cadastros_sinodos.sigla).parent().addClass("error");
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
                let form = $('#cadastros_sinodos').serializeArray();

                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */
                form.unshift({name: 'usuario_inclusao', value: user.ID_USUARIO});
                form.unshift({name: 'data_inclusao', value: window.getData});
                /**
                 * Acrescenta ao array form os dados do usuario e data
                 */

                $.post('api/sinodos/store', form)
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
                        if (result > 0 ) {
                            $(cadastros_sinodos.sigla).parent().addClass("error");
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

    /**
     * Ao clicar no botão limpar, reseta as classes de erro
     */
    $(".ui.reset.button").on("click", function () {
        validator.resetForm();
        $('form').form('reset');
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
    $("a[data-tab='second']").on("click",function (){
        if ( id_row > 0 ) {
            getDataForm();
        } else {
            /**
             * reseta os campos do tipo input
             */
            cadastros_sinodos.reset();

            /**
             * retorna o select para a primera opção
             * @type {number}
             */
            validator.resetForm();
            $('form').form('reset');
        }
    });

    /**
     * Função para quando for na aba lista, zerar o id_row
     */
    $("a[data-tab='first']").on("click",function (){
        if (id_row > 0 ){
            id_row = null;
            tbl_api.row().deselect();
            tbl_api.$('tr.active').removeClass('active');
        }
    });

    /**
     * Verifica Sessão do usuário
     *   para ser enviado junto ao array form
     * @type {string}
     */
    let user = btoa("user-data");
    user = sessionStorage.getItem(user);
    user = atob(user);
    user = JSON.parse(user);
});