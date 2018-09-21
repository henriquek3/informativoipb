window.addEventListener("load", function () {
    $('.ui.dropdown').dropdown();
    /**
     * Função Internationalization do search Semantic-ui
     * @param message
     * @param type
     * @returns {string}
     */
    var newHeader = function (message, type) {
        var
            html = '';
        if (message !== undefined && type !== undefined) {
            html += '' + '<div class="message ' + type + '">';
            // message type
            if (type == 'empty') {
                html += '' + '<div class="header">Nenhum resultado!</div class="header">' + '<div class="description">' + message + '</div class="description">';
            } else {
                html += ' <div class="description">' + message + '</div>';
            }
            html += '</div>';
        }
        return html;
    };

    // the new message header is applied to all following "search" instances
    $.fn.search.settings.templates.message = newHeader;

    $('#sinodo_search')
        .search({
            apiSettings: {
                url: '/api/sinodos?nome={query}'
            },
            searchDelay: 900,
            fields: {
                results: 'items',
                title: 'nome',
                url: 'html_url'
            },
            minCharacters: 3,
            error: {
                source: 'Cannot search. No source used, and Semantic API module was not included',
                noResults: 'A sua consulta não obteve nenhum resultado.',
                logging: 'Error in debug logging, exiting.',
                noTemplate: 'A valid template name was not specified.',
                serverError: 'There was an issue with querying the server.',
                maxResults: 'Results must be an array to use maxResults setting',
                method: 'The method you called is not defined.'
            },
            onSelect: function (result) {
                $('[name="id_sinodo"]').val(result.id);
            }
        })
    ;

    $('#presbiterio_search')
        .search({
            apiSettings: {
                url: '/api/presbiterios?nome={query}&sinodo={sinodo}',
                beforeSend: function (settings) {
                    settings.urlData.sinodo = $('[name="id_sinodo"]').val();
                    return settings;
                }
            },
            searchDelay: 900,
            fields: {
                results: 'items',
                title: 'nome',
                url: 'html_url'
            },
            minCharacters: 3,
            error: {
                source: 'Cannot search. No source used, and Semantic API module was not included',
                noResults: 'A sua consulta não obteve nenhum resultado.',
                logging: 'Error in debug logging, exiting.',
                noTemplate: 'A valid template name was not specified.',
                serverError: 'There was an issue with querying the server.',
                maxResults: 'Results must be an array to use maxResults setting',
                method: 'The method you called is not defined.'
            },
            onSelect: function (result) {
                $('[name="id_presbiterio"]').val(result.id).trigger('change');
            }
        })
    ;

    $('#ordenacao_presbiterio_search')
        .search({
            apiSettings: {
                url: '/api/presbiterios?nome={query}&sinodo={sinodo}',
                beforeSend: function (settings) {
                    settings.urlData.sinodo = 'todos';
                    return settings;
                }
            },
            searchDelay: 900,
            fields: {
                results: 'items',
                title: 'nome',
                url: 'html_url'
            },
            minCharacters: 3,
            error: {
                source: 'Cannot search. No source used, and Semantic API module was not included',
                noResults: 'A sua consulta não obteve nenhum resultado.',
                logging: 'Error in debug logging, exiting.',
                noTemplate: 'A valid template name was not specified.',
                serverError: 'There was an issue with querying the server.',
                maxResults: 'Results must be an array to use maxResults setting',
                method: 'The method you called is not defined.'
            },
            onSelect: function (result) {
                $('[name="ordenacao_presbiterio"]').val(result.id).trigger('change');
            }
        })
    ;

    $(formResource.id_presbiterio).on('change', function () {
        if ($(formResource.id_presbiterio).val() > 0) {
            $("#div_igreja").find(".search").hide();
            $("#loader_igreja").show();
            $.get('/api/igrejas?presbiterio=' + $(formResource.id_presbiterio).val())
                .done(function (response) {
                    $.each(response['items'], function () {
                        $(formResource.id_igreja).append(
                            $('<option />').val(this.id).text(this.nome.toUpperCase())
                        );
                    });
                    $(formResource.id_igreja).val(window.id_igreja);
                    $("#div_igreja").find(".search").show();
                    $("#loader_igreja").hide()
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

    /**
     * Function para o select Estado de NASCIMENTO
     */
    $('[name="nascimento_id_estado"]').on('change', function () {
        if ($('[name="nascimento_id_estado"]').val() > 0) {
            $('[name="nascimento_id_cidade"]').children().remove();
            $("#div_cidade").find(".search").hide();
            $("#loader_cidade").show();
            $.get('/api/cidades?uf=' + $('[name="nascimento_id_estado"]').val())
                .done(function (response) {
                    $.each(response, function () {
                        $('[name="nascimento_id_cidade"]').append(
                            $('<option />').val(this.id).text(this.nome.toUpperCase())
                        );
                    });
                    $("#div_cidade").find(".search").show();
                    $("#loader_cidade").hide()
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

    /**
     * Function para o select Estado ENDEREÇO
     */
    $('[name="endereco_id_estado"]').on('change', function () {
        if ($('[name="endereco_id_estado"]').val() > 0) {
            $('[name="endereco_id_cidade"]').children().remove();
            $("#div_cidade_end").find(".search").hide();
            $("#loader_cidade_end").show();
            $.get('/api/cidades?uf=' + $('[name="endereco_id_estado"]').val())
                .done(function (response) {
                    $.each(response, function () {
                        $('[name="endereco_id_cidade"]').append(
                            $('<option />').val(this.id).text(this.nome.toUpperCase())
                        );
                    });
                    $("#div_cidade_end").find(".search").show();
                    $("#loader_cidade_end").hide()
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