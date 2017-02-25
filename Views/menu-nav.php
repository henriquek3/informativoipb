<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 24/02/17
 * Time: 13:52
 */
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
        #footer {
            position: fixed;
            height: 50px;
            bottom: 0;
            left: 0;
            right: 0;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<div class="ui four column grid">

    <div class="computer only two column row">
        <div class="ui attached stackable menu">
            <div class="ui container">
                <div class="ui simple dropdown item">
                    <i class="big edit icon"></i>
                    Cadastros
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item"><i class="edit icon"></i> Sinodos </a>
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
        <div class="ui container" id="footer">
            <div class="ui mini menu">
                <a class="item">Usuario:Administrador</a>
                <a class="item"> Sínodo: Centro America </a>
                <a class="item"> Presbitério: Rondonópolis </a>
                <a class="item">Igreja: Presbiteriana Luz e Vida</a>
            </div>
        </div>
</div>

    <div class="ui left demo vertical inverted sidebar labeled icon menu">
        <a class="item">
            <i class="home icon"></i>
            Home
        </a>
        <a class="item">
            <i class="block layout icon"></i>
            Topics
        </a>
        <a class="item">
            <i class="smile icon"></i>
            Friends
        </a>
    </div>

    <div class="tablet only mobile only eight wide column">
        <div class="ui button">
            Open Sidebar
        </div>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
<script src="vendor/semantic/semantic.min.js"></script>
<script src="https://cdn.jsdelivr.net/semantic-ui/2.2.8/semantic.min.js"></script>
<!--- Example Javascript -->
<script>
    $(document)
        .ready(function() {
            $('.ui.menu .ui.dropdown').dropdown({
                on: 'hover'
            });
            $('.ui.menu a.item')
                .on('click', function() {
                    $(this)
                        .addClass('active')
                        .siblings()
                        .removeClass('active')
                    ;
                })
            ;
        })
    ;
    $('.left.demo.sidebar').first()
        .sidebar('attach events', '.button', 'show')
    ;
    $('.open.button')
        .removeClass('disabled')
    ;
</script>

</body>
</html>