<?php
/**
 * Created by PhpStorm.
 * User: Jean Freitas
 * Date: 24/02/2017
 * Time: 21:46
 */
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="vendor/semantic/semantic.min.css">
    <title>Document</title>
</head>
<body>
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
<div class="ui button">
    Open Sidebar
</div>
<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous">
</script>
<script src="vendor/semantic/semantic.min.js"></script>
<script>
    $('.left.demo.sidebar').first()
        .sidebar('attach events', '.button', 'show')
    ;
    $('.open.button')
        .removeClass('disabled')
    ;
</script>
</body>
</html>
