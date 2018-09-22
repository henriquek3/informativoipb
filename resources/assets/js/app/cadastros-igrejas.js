window.addEventListener("load", function () {
    /**
     * Instancia o search do dropdown semantic-ui
     */
    $('.ui.dropdown').dropdown();

    /**
     * @description Popular a Aba Cadastrar, Naturalidade
     */
    $(formResource.id_estado).on('change', function () {
        if ($(formResource.id_estado).val() > 0) {
            $("#id_cidade").children().remove();
            $("#div_cidade").find(".search").hide();
            $("#loader_cidade").show();
            $.get('/api/cidades?uf=' + $(formResource.id_estado).val())
                .done(function (response) {
                    $.each(response, function () {
                        $(formResource.id_cidade).append(
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
                $('[name="id_presbiterio"]').val(result.id);
            }
        })
    ;

    /** FUNÇÃO PARA ALTERAR STYLE DOS INPUTS DOS TELEFONES ADIDCIONAIS **/
    var i;
    for (i = 0; i < $('.tel_alt').length; i++) {
        console.log($('.tel_alt')[i].value)
        if ($('.tel_alt')[i].value !== ''){
            $('.tel_alt')[i].style.display = 'none'

        }
    }



});