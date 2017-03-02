<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 22/02/17
 * Time: 14:57
 */

$url = $_SERVER['REQUEST_URI'];

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!-- <form action="../Controllers/Sinodos.php" method="post">
     <div>
         <label>Sigla</label>
         <input type="text" name="sigla">
     </div>
     <div>
         <label>Nome</label>
         <input type="text" name="nome">
     </div>
     <div>
         <button type="submit" value="" name="enviar">Enviar</button>
     </div>
 </form> -->
<h1>
    <?php
    echo $url;
    ?>
</h1>
</body>
</html>
