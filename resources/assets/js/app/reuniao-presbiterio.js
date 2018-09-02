$(document).ready(function () {
    $('.ui.dropdown').dropdown();
    $('[name="id_estado"]').on('change', function () {
        if ($('[name="id_estado"]').val() > 0) {
            $('[name="id_cidade"]').children().remove();
            $("#div_cidade").find(".search").hide();
            $("#loader_cidade").show();
            $.get('/api/cidades?uf=' + $('[name="id_estado"]').val())
                .done(function (response) {
                    $.each(response, function () {
                        $('[name="id_cidade"]').append(
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
});