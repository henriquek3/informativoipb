<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('images/favicon.ico')}}">
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('js/app/pace-app.js')}}"></script>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.min.css')}}">
    <title>InformativoIPB</title>
    <style>
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
</head>
<body class="ui container">
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header"><img class="image" src="images/ipb_logo.png">
            <div class="content">InformativoIPB</div>
        </h2>
        <form class="ui large form" name="form_login" id="form_login">@csrf
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input"><i class="user icon"></i>
                        <input type="text" name="email" placeholder="Insira seu e-mail">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input"><i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Insira sua senha">
                    </div>
                </div>
                <div class="ui fluid large teal submit button">Conectar</div>
            </div>
            <div class="ui error message"></div>
        </form>
        <div class="ui error message" style="text-align:left;display:none;" id="msg_login_error"><i
                    class="close icon"></i>
            <div class="header">Atenção, verifique a mensagem abaixo!</div>
            <ul class="list">
                <li id="msg_error"></li>
            </ul>
        </div>
        <div class="ui message">Esqueceu a senha? <a href="#" id="give_pass">Clique Aqui!</a></div>
    </div>
</div>
</body>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/semantic.min.js"></script>
<script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
<script type="text/javascript" src="js/app/login-app.js"></script>
</html>