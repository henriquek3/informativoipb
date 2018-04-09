
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

    $("#logout, #logout_m").click(function () {
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

    window.getData = (function () {
        let now = new Date();
        let d = now.getDate() + "";
        let m = now.getMonth() + "";
        let y = now.getFullYear() + "";
        if (d.length < 2) {
            d = "0" + d;
        }
        if (m.length < 2) {
            m = "0" + m;
        }
        return `${d}/${m}/${y}`;
    })()

    /**
     * Verifica Sessão do usuário
     *   para ser enviado junto ao array form
     * @type {string}
     */
    /*window.user = btoa("user-data");
    window.user = sessionStorage.getItem(window.user);
    window.user = atob(window.user);
    window.user = JSON.parse(window.user);*/

    $(".in-dev").on("click", function () {
        swal("Em Desenvolvimento!", "Aguarde a liberação desta funcionalidade.", "info");
        return false;
    })

});
