
/**
 * @description Aqui será implementado o javascript que será utilizado em todas as telas, por exemplo verificação de login.
 *
 */
$(document).ready(function () {

    // cria o sidebar e adiciona um evento ao botão
    $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
    ;

    $('#windows')
        .transition('fade down', '500ms')
    ;
    $('.ui.checkbox')
        .checkbox()

    $('.ui.sidebar').first()
        .sidebar('attach events', '.toc', 'show')
    ;
    $('.accordion.menu')
        .accordion()
    ;
    $('.envelope')
        .transition({
            animation: 'pulse',
            duration: '3s',
            allowRepeats: true,
            looping    : 'looping',
        })
    ;
    $(".ui.modal")
        .modal({
            approve: '.approve'
        })
        .modal(
            'attach events',
            '.envelope',
            'show'
        )
    ;

    $(".item.sinodos").on('click', function(){
        iziToast.warning({
            title: 'Acesso Negado',
            message: 'Caso precise acessar essa opção consulte o seu usuário superior.',
            timeout: 5000
        });
        return false;
    });

    $("#logout").click(function () {
        sessionStorage.clear();
        document.location.href = '/pre-login';
        /*$.get('api/connect?desconnect=1')
            .done(function (response) {
                console.log(response);
                document.location.href = '/pre-login';
            })
            .fail(function (response) {
                console.log(response);
            })
        ;*/
    });

});
