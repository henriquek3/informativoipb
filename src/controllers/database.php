<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 08/04/2018
 * Time: 11:07
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
    $file = fopen(__DIR__ . '/../data/backup_jksistem_informativoipb.sql', 'r');
    while ($line = fread($file, 4096)) {
        $app['db']->executeQuery($line);
    }
    fclose($file);
    return "Tabelas criadas";
});


$app->get('/insert-geo', function (Silex\Application $app) {
    $file = fopen(__DIR__ . '/../data/backup_jksistem_informativoipb.sql', 'r');
    while ($line = fread($file, 4096)) {
        $app['db']->executeQuery($line);
    }
    fclose($file);
    return "Re-create tables and insert data in paises, estados e cidades.";
});

