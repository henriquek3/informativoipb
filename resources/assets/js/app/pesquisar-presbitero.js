$(document).ready(function () {
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

    $('.ui.search')
        .search({
            apiSettings: {
                url: '/api/ministros?nome={query}'
            },
            searchDelay: 900,
            fields: {
                results: 'items',
                title: 'nome',
                url: 'html_url',
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
                document.location.href = `/cadastros/presbiteros/${result.id}/editar`
            }
        })
    ;
});
