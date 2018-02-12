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
        'dbname' => 'servidor_tecman',
        'user' => 'servidor_tecman',
        'password' => 'AdjXr]C4x0k@',   
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

$app->get('/inicio', function () {
    ob_start();
    include __DIR__ . '/../templates/index.html';
    return ob_get_clean();
});

$app->get('/login', function () {
    ob_start();
    include __DIR__ . '/../templates/page-login.html';
    return ob_get_clean();
});

$app->get('/sistema-parametros', function () {
    ob_start();
    include __DIR__ . '/../templates/sistema-parametros.html';
    return ob_get_clean();
});
$app->get('/usuario', function () {
    ob_start();
    include __DIR__ . '/../templates/page-user.html';
    return ob_get_clean();
});

$app->get('/tipos-documentos', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-financeiro-tipos-documentos.html';
    return ob_get_clean();
});

$app->get('/historicos-financeiros', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-financeiro-historicos-financeiro.html';
    return ob_get_clean();
});

$app->get('/plano-gerencial', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-financeiro-plano-gerencial.html';
    return ob_get_clean();
});

$app->get('/plano-contabil', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-financeiro-plano-contabil.html';
    return ob_get_clean();
});

$app->get('/cadastros-pessoas', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-pessoas-pessoas.html';
    return ob_get_clean();
});

$app->get('/cadastros-empresas', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-empresas-empresas.html';
    return ob_get_clean();
});

$app->get('/cadastros-filiais', function () {
    ob_start();
    include __DIR__ . '/../templates/cadastros-empresas-filiais.html';
    return ob_get_clean();
});

/***************************************************/
// @todo Módulo RH
/***************************************************/
$app->get('/rh-emissao-advertencias', function () {
    ob_start();
    include __DIR__ . '/../templates/rh-emissao-advertencias.html';
    return ob_get_clean();
});
$app->get('/rh-emissao-advertencias-print', function () {
    ob_start();
    include __DIR__ . '/../templates/rh-emissao-advertencias-print.html';
    return ob_get_clean();
});
$app->get('/rh-emissao-aviso-ferias', function () {
    ob_start();
    include __DIR__ . '/../templates/rh-emissao-aviso-ferias.html';
    return ob_get_clean();
});
$app->get('/rh-emissao-aviso-ferias-print', function () {
    ob_start();
    include __DIR__ . '/../templates/rh-emissao-aviso-ferias-print.html';
    return ob_get_clean();
});
$app->get('/rh-emissao-aviso-previo', function () {
    ob_start();
    include __DIR__ . '/../templates/rh-emissao-aviso-previo.html';
    return ob_get_clean();
});
$app->get('/rh-emissao-aviso-previo-print', function () {
    ob_start();
    include __DIR__ . '/../templates/rh-emissao-aviso-previo-print.html';
    return ob_get_clean();
});
$app->get('/rh-emissao-holerites', function () {
    ob_start();
    include __DIR__ . '/../templates/rh-emissao-holerites.html';
    return ob_get_clean();
});
$app->get('/rh-emissao-holerites-print', function () {
    ob_start();
    include __DIR__ . '/../templates/rh-emissao-holerites-print.html';
    return ob_get_clean();
});


/***************************************************/
// @todo CRUD
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

$app->post('api/pessoas/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('pessoas', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM pessoas WHERE id = ?", [$id]);
    return $app->json($row);

});

$app->post('api/pessoas/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('pessoas', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM pessoas WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/pessoas/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('pessoas', ['id' => $id]);
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

$app->get('/teste/login', function (Request $request) use ($app) {

    $username = $request->server->get('PHP_AUTH_USER', false);
    $password = $request->server->get('PHP_AUTH_PW');

    if ('igor' === $username && '123' === $password) {
        $app['session']->set('user', array('username' => $username));
        return $app->redirect('/test/account');
    }
    return $app->redirect('/login');
});


/***************************************************/
// @todo app-run();
/***************************************************/

$app->run();

