<?php

$app = new Silex\Application();


/**
 * @todo Configurações de serviços e registers
 */
include __DIR__ . '/services.php';

/**
 * @todo Configurações de rotas de navegação dos links hmtl
 */
include __DIR__ . '/routes.php';

/**
 * @api Arquivos listados abaixo são de responsabilidade de comunicar interface com a api
 */
include __DIR__ . '/controllers.php';

/**
 * @todo Lançar uma instancia da api
 */
$app->run();
