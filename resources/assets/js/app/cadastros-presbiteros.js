window.addEventListener("load", function () {
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
});