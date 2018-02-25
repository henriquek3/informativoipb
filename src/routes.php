<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 24/02/2018
 * Time: 08:02
 */

$app->get('/', function () {
    ob_start();
    include __DIR__ . '/../templates/index.html';
    return ob_get_clean();
});

$app->get('/index.html', function () {
    ob_start();
    include __DIR__ . '/../templates/index.html';
    return ob_get_clean();
});

$app->get('/cadastros-sinodos.html', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-sinodos.html';
    return ob_get_clean();
});

$app->get('/cadastros-igrejas.html', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-igrejas.html';
    return ob_get_clean();
});

$app->get('/cadastros-presbiterios.html', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-presbiterios.html';
    return ob_get_clean();
});

$app->get('/cadastros-igrejas.html', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-igrejas.html';
    return ob_get_clean();
});

$app->get('/cadastros-presbiteros.html', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-presbiteros.html';
    return ob_get_clean();
});

$app->get('/relatorios-conselhos.html', function () {
    ob_start();
    include __DIR__ . '/../templates/relatorios-conselhos.html';
    return ob_get_clean();
});

$app->get('/relatorios-ministeriais.html', function () {
    ob_start();
    include __DIR__ . '/../templates/relatorios-ministeriais.html';
    return ob_get_clean();
});

$app->get('/relatorios-estatisticas.html', function () {
    ob_start();
    include __DIR__ . '/../templates/relatorios-estatisticas.html';
    return ob_get_clean();
});


$app->get('/sistema-parametros', function () {
    ob_start();
    include __DIR__ . '/../templates/sistema-parametros.html';
    return ob_get_clean();
});

$app->get('/login', function () {
    ob_start();
    include __DIR__ . '/../templates/page-login.html';
    return ob_get_clean();
});
