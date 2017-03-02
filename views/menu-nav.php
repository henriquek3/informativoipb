<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 24/02/17
 * Time: 13:52
 */
$dektop = "../views/home/home-desktop.php";
$mobile = "../views/home/home-mobile.php";
$modal = "../views/home/home-modal.php";
if (!empty($_GET['cadastros'])) {
    $url = $_GET['cadastros'];
    switch ($url) {
        case $url:
            $dektop = "../views/cadastros/sinodos/cadastro-sinodo-desktop.php";
            $mobile = "../views/cadastros/sinodos/cadastro-sinodo-mobile.php";
            $modal = "../views/cadastros/sinodos/cadastro-sinodo-modal.php";
            break;
    }
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.8/semantic.min.css">
    <title>MenuTest</title>
    <style>
        /* estilo para fixar o footer no rodapé */
        #footer {
            position: fixed;
            /* height: 0px; */
            bottom: 0;
            left: 0;
            right: 0;
            margin-bottom: 0;
        }
    </style>
</head>
<body>

<!-- tags para alinhamento responsivo -->
<div class="ui column grid">

    <!-- menu visivel somente por computadores ou dispositivos com resulução acima de 768p -->
    <div class="computer only column row">

        <!-- menu-nav desktop mode -->
        <div class="ui fixed stackable menu">
            <div class="ui container">
                <div class="ui simple dropdown item">
                    <i class="big edit icon"></i>
                    Cadastros
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="menu-nav.php?cadastros=sinodos"><i class="edit icon"></i> Sinodos </a>
                        <a class="item"><i class="edit icon"></i> Presbitérios </a>
                        <a class="item"><i class="edit icon"></i> Igrejas </a>
                        <a class="item"><i class="edit icon"></i> Oficiais </a>
                    </div>
                </div>
                <div class="ui simple dropdown item">
                    <i class="big browser icon"></i>
                    Relatórios
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item"><i class="browser icon"></i> Conselho </a>
                        <a class="item"><i class="browser icon"></i> Ministerial </a>
                        <a class="item"><i class="browser icon"></i> Estatística </a>
                    </div>
                </div>
                <div class="ui simple dropdown item">
                    <i class="big bar chart icon"></i>
                    Consultas
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item"><i class="bar chart icon"></i> Conselho </a>
                        <a class="item"><i class="bar chart icon"></i> Ministerial </a>
                        <a class="item"><i class="bar chart icon"></i> Estatística </a>
                    </div>
                </div>
                <div class="ui simple dropdown item">
                    <i class="big settings icon"></i>
                    Configurações
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item"><i class="users icon"></i> Usuários </a>
                        <a class="item"><i class="lock icon"></i> Trocar senha </a>
                        <a class="item"><i class="heartbeat icon"></i> Solicitar Suporte </a>
                    </div>
                </div>

                <!-- Menu lado direito -->
                <div class="right menu">
                    <div class="right menu">
                        <div class="item">
                            <div class="ui green animated button" tabindex="0">
                                <div class="visible content">
                                    <i class="large arrow right icon"></i>
                                </div>
                                <div class="hidden content">Sair</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- body -->
        <div class="ui container desktop" style="padding-top: 70px">
            <?php include $dektop; ?>
        </div>

        <!-- Rodapé visualizado em 768p -->
        <div class="ui container fluid" id="footer">
            <div class="ui mini segments">
                <div class="ui segment">
                    <div class="ui four column centered grid">
                        <div class="column">
                            <a class="item">Usuário: Jean Freitas</a>
                        </div>
                        <div class="column">
                            <a class="item"> Igreja: Presbiteriana Luz e Vida </a>
                        </div>
                        <div class="column">
                            <a class="item"> Presbitério: Rondonópolis </a>
                        </div>
                        <div class="column">
                            <a class="item">Sínodo: Centro América</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Vertical em resolução abaixo de 768p -->
    <div class="ui left demo vertical sidebar menu">
        <div class="item">
            <i class="green edit icon"></i>
            <div class="header">Cadastros</div>
            <div class="menu">
                <a class="item" href="menu-nav.php?cadastros=sinodos">Sínodos</a>
                <a class="item">Presbitérios</a>
                <a class="item">Igrejas</a>
                <a class="item">Membros</a>
            </div>
        </div>
        <div class="item">
            <i class="green browser icon"></i>
            <div class="header">Relatórios</div>
            <div class="menu">
                <a class="item">Estatisticas</a>
                <a class="item">Financeiros</a>
                <a class="item">Ministerial</a>
            </div>
        </div>
        <div class="item">
            <i class="green bar chart icon"></i>
            <div class="header">Consultas</div>
            <div class="menu">
                <a class="item">Estatisticas</a>
                <a class="item">Financeiros</a>
                <a class="item">Ministerial</a>
            </div>
        </div>
        <div class="item">
            <i class="green settings icon"></i>
            <div class="header">Configurações</div>
            <div class="menu">
                <a class="item">Usuários</a>
                <a class="item">Trocar Senha</a>
                <a class="item">Solicitar Suporte</a>
            </div>
        </div>
        <div class="item">
            <i class="green sign out icon"></i>
            <div class="header">Desconectar</div>
        </div>
    </div>

    <!-- tablets and smartphones -->
    <div class="tablet only mobile only sixteen wide column">

        <!-- Botões superiores -->
        <div class="ui fixed menu">
            <div class="three big ui icon buttons green">
                <button class="ui button open"><!-- tag .open é o disparador do js do menu -->
                    <i class="inverted list layout icon"></i>
                </button>
                <button class="ui button" onclick='location.href="menu-nav.php"'><!-- Botão Home -->
                    <i class="inverted large home icon"></i>
                </button>
                <button class="ui button"><!-- Botão wait/sem função -->
                    <i class="inverted wait icon"></i>
                </button>
            </div>
        </div>

        <!-- Body -->
        <div class="ui grid" style="padding-top: 65px">
            <?php include $mobile; ?>
        </div>
        <div class="ui basic disabled bottom attached button" id="footer">Rodapé</div>
    </div>
</div>

<!-- Modal -->
<?php include $modal; ?>

<!-- lib jquery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

<!-- lib js semantic -->
<script src="vendor/semantic/semantic.min.js"></script>
<script src="https://cdn.jsdelivr.net/semantic-ui/2.2.8/semantic.min.js"></script>
<script>
    //function do dropdown
    $(document)
        .ready(function () {
            $('.ui.menu .ui.dropdown').dropdown({
                on: 'hover'
            });
            $('.ui.menu a.item')
                .on('click', function () {
                    $(this)
                        .addClass('active')
                        .siblings()
                        .removeClass('active')
                    ;
                })
            ;
        })
    ;
    //function para acionar o menu lateral em resoluções abaixo de 768p
    $('.left.demo.sidebar').first()
        .sidebar('attach events', '.open.button', 'show')
    ;
    $('.open.button')
        .removeClass('disabled')
    ;
    // function para o sistema de abas
    $('.menu .item')
        .tab()
    ;
    // function para os modais
    $('.coupled.modal')
        .modal({
            allowMultiple: false
        })
    ;
    // attach events to buttons
    $('.second.modal')
        .modal('attach events', '.first.modal .button')
    ;
    // show first now
    $('.first.modal')
        .modal('attach events', '.ui.green.button')
    ;
    $('.first.modal')
        .modal('attach events', '.hidemodal', 'hide')
    ;
    //js para transição do menu
    $('.ui.container.desktop')
        .hide() //.fadeIn(5000)
        .transition('fade down', '2000ms')
    //.hide()
    //.transition()
    ;
</script>
</body>
</html>
