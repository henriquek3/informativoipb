<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 24/02/2018
 * Time: 08:02
 */


$app->get('/import-backup', function (Silex\Application $app) {
    $file = fopen(__DIR__ . '/../data/backup_jksistem_informativoipb.sql', 'r');
    while ($line = fread($file, 4096)) {
        $app['db']->executeQuery($line);
    }
    fclose($file);
    return "Backup Restaurado";
});

$app->get('/create-table', function (Silex\Application $app) {
    $file = fopen(__DIR__ . '/../data/schema.sql', 'r');
    while ($line = fread($file, 4096)) {
        $app['db']->executeQuery($line);
    }
    fclose($file);
    return "Estrutura do banco de dados criadas com sucesso";
});

$app->get('/insert-geo', function (Silex\Application $app) {
    $file = fopen(__DIR__ . '/../data/pais_estados_cidades.sql', 'r');
    while ($line = fread($file, 4096)) {
        $app['db']->executeQuery($line);
    }
    fclose($file);
    return "Re-create tables and insert data in paises, estados e cidades.";
});

$app->get('/{routes}', 
    function ($routes) {
        ob_start();        
        $file = __DIR__ . "/../templates/{$routes}.html";
        if ( file_exists($file) ) {
            include $file;
        } elseif ($routes == 'inicio') {
            include __DIR__ . '/../templates/index.html';
        } elseif (is_null($routes)) {
            include __DIR__ . '/../templates/index.html';
        } else {
            include __DIR__ . '/../templates/page-error.html';
        }
        return ob_get_clean();
    }
);

$app->get("/",
    function () {
        ob_start();
        include __DIR__ . "/../templates/index.html";
        return ob_get_clean();
    }
);

$app->get("/pre-login",
    function () {
        ob_start();
        include __DIR__ . "/../templates/pre-login.html";
        return ob_get_clean();
    }
);