<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
include __DIR__ . '/controllers/geografia.php';
include __DIR__ . '/controllers/sinodos.php';
include __DIR__ . '/controllers/presbiterios.php';
include __DIR__ . '/controllers/usuarios.php';

/**
 * @todo Lançar uma instancia da api
 */
$app->run();
