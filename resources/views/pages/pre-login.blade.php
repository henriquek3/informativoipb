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
</head>
<body class="ui container">
<div class="ui grid">
    <div class="sixteen wide column">
        <div class="ui segments">
            <div class="ui horizontal segments">
                <div class="ui segment">
                    <div class="ui segment">
                        <div class="ui form">
                            <button class="ui fluid blue button" name="supremo">SUPREMO</button>
                        </div>
                    </div>
                </div>
                <div class="ui segment">
                    <div class="ui segment">
                        <div class="ui form">
                            <button class="ui fluid yellow button" name="supremo">SÍNODOS</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui horizontal segments">
                <div class="ui segment">
                    <div class="ui segment">
                        <div class="ui form">
                            <button class="ui fluid red button" name="supremo">PRESBITÉRIOS</button>
                        </div>
                    </div>
                </div>
                <div class="ui segment">
                    <div class="ui segment">
                        <div class="ui form">
                            <button class="ui fluid teal button" name="supremo">IGREJAS</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- Essential javascripts for application to work-->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/semantic.min.js"></script>
<script type="text/javascript">
    $("button").click(function () {
        document.location = "/login";
    });
</script>
</html>