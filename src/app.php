<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/***************************************************/
// @todo Administracao App
/***************************************************/

$app = new Silex\Application();

$app['debug'] = true;

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});

$app->register(new Silex\Provider\SessionServiceProvider());
//$app->register(new Silex\Provider\VarDumperServiceProvider());

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'jksistem_informativoipb',
        /*'user' => 'jksistem_ipbsys',
        'password' => 'azfRm9ps]9M&',*/
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
    ),
));

$app->error(function (\Exception $e, Request $request, $code) {
    switch ($code) {
        case 404:
            ob_start();
            include __DIR__ . '/../templates/page-error.html';
            //dump($e);
            return ob_get_clean();
            break;
        case 405:
            $message = "Code http: " . $code . "<br/><hr/>";
            $message .= "Event: " . "<pre>" . $e . "</pre>" . "<hr/>";
            $message .= "Request: " . "<pre>" . $request . "</pre>" . "<br/>";
            //dump($e);
            break;
        case 500:
            $message = "Code http: " . $code . "<br/><hr/>";
            $message .= "Event: " . "<pre>" . $e . "</pre>" . "<hr/>";
            $message .= "Request: " . "<pre>" . $request . "</pre>" . "<br/>";
            //dump($e);
            break;
        default:
            $message = 'Exceção não tratada, msg gerada pela linha 54 do App.php' . "<br/>";
            $message .= "Code http: " . $code . "<br/><hr/>";
            $message .= "Event: " . "<pre>" . $e . "</pre>" . "<hr/>";
            $message .= "Request: " . "<pre>" . $request . "</pre>" . "<br/>";
        //dump($e);
    }
    return new Response($e->getMessage());
});

/***************************************************/
// @todo Rotas das Paginas
/***************************************************/

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

/*
$app->get('/login', function () {
    ob_start();
    include __DIR__ . '/../templates/page-login.html';
    return ob_get_clean();
});

$app->get('/sistema-parametros', function () {
    ob_start();
    include __DIR__ . '/../templates/sistema-parametros.html';
    return ob_get_clean();
});*/

$app->get('/cadastros-sinodos.html', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-sinodos.html';
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

/***************************************************/
// @Api CRUD
/***************************************************/

// Paises
$app->get('api/paises', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM paises";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

// Estados
$app->get('api/estados', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM estados";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});


// cidades
$app->get('api/cidades', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM cidades";
    $id = (int)$request->get('id');
    $id_estado = (int)$request->get('uf');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    if ($id_estado > 0) {
        $query .= " WHERE id_estado = ?";
        array_push($params, $id_estado);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});


/***************************************************/
// @Api Sinodos
/***************************************************/
$app->get('api/sinodos', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM sinodos";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/sinodos/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('sinodos', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM sinodos WHERE id = ?", [$id]);
    return $app->json($row);

});

$app->post('api/sinodos/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('sinodos', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM sinodos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/sinodos/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('sinodos', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/***************************************************/
// @Api Presbitérios
/***************************************************/
$app->get('api/presbiterios', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM presbiterios";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/presbiterios/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('presbiterios', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM presbiterios WHERE id = ?", [$id]);
    return $app->json($row);

});

$app->post('api/presbiterios/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('presbiterios', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM presbiterios WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/presbiterios/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('presbiterios', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/***************************************************/
// @todo Login
/***************************************************/

/**
 * @return string JSON
 */
function generatorToken()
{
    $key = 'coram-deo';
    $header = [
        'typ' => 'JWT',
        'alg' => 'HS256'
    ];
    $header = json_encode($header);
    $header = base64_encode($header);
    $payload = [
        'iss' => 'http://tecman.servidordiegorohden.com.br',
        'desenvolvedor' => "Jean Henrique Rodrigues de Freitas",
        'email' => "henriquek3@live.com"
    ];
    $payload = json_encode($payload);
    $payload = base64_encode($payload);
    $signature = hash_hmac('sha256', "$header.$payload", $key, true);
    $signature = base64_encode($signature);
    $token = "$header.$payload.$signature";
    return $token;
}

$app->get('api/connect', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM usuarios";
    $user = (string)$request->get('user');
    $pass = (string)$request->get('password');
    $params = [];
    if (is_string($user) > 0) {
        $query .= " WHERE login = ?";
        array_push($params, $user);
    }

    if (is_string($pass) > 0) {
        $query .= " AND password = ?";
        array_push($params, $pass);
    }

    $result = $db->fetchAll($query, $params);

    if (count($result) > 0) {
        $result[0]['token'] = generatorToken();
    }

    return $app->json($result);
});

/***************************************************/
// @todo app-run();
/***************************************************/

$app->run();

