<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 03/03/17
 * Time: 13:27
 */
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.8/semantic.min.css">
    <meta name="author" content="Jean Freitas, Kallew Cesar"/>
    <meta name="description"
          content="Sistema projeto para atender ao sistema de estatistica da Igreja Presbiteriana do Brasil"/>
    <meta content="estatistica, relatorios, consultas, ministerio, presbiteriano" name="keywords">

    <!-- lib css -->
    <link rel="icon" href="views/img/favicon.ico"/>
    <link rel="apple-touch-icon" href="views/img/favicon.ico"/>

    <!-- lib jquery -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

    <!-- lib js semantic -->
    <script src="vendor/semantic/semantic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/semantic-ui/2.2.8/semantic.min.js"></script>

    <title>InformativoIPB</title>

    <style type="text/css">
        body {
            background-color: #DADADA;
        }

        body > .grid {
            height: 100%;
        }

        .image {
            margin-top: -100px;
        }

        .column {
            max-width: 450px;
        }
    </style>
    <script>
        $(document)
            .ready(function () {
                $('.ui.form')
                    .form({
                        fields: {
                            email: {
                                identifier: 'email',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please enter your e-mail'
                                    },
                                    {
                                        type: 'email',
                                        prompt: 'Please enter a valid e-mail'
                                    }
                                ]
                            },
                            password: {
                                identifier: 'password',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please enter your password'
                                    },
                                    {
                                        type: 'length[6]',
                                        prompt: 'Your password must be at least 6 characters'
                                    }
                                ]
                            }
                        }
                    })
                ;
            })
        ;
    </script>
</head>
<body>

<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui green image header">
            <img src="../img/ipb_logo.png" class="image">
            <div class="content">
                Log-in to your account
            </div>
        </h2>
        <form class="ui large form">
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="email" placeholder="Endereço de e-mail">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Senha">
                    </div>
                </div>
                <div class="ui fluid large green submit button">Conectar</div>
            </div>

            <div class="ui error message"></div>

        </form>

        <div class="ui message">
            Sem acesso? <a href="#"> Solicitar</a>
        </div>
    </div>
</div>

</body>

</html>

