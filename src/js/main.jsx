/**
 * @description Aqui será implementado o javascript que será utilizado em todas as telas, por exemplo verificação de login.
 *
 */
$(document).ready(function () {
    setTimeout(function () {
        $("input[type='search']").parent().addClass(" ui form");
        $("input[type='search']").css("width", "220px");
        console.log("exec input search class ui form");
    }, 1000);

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
    })








});
