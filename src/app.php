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
        /*'dbname' => 'servidor_tecman',
        'user' => 'servidor_tecman',
        'password' => 'AdjXr]C4x0k@', */
        'dbname' => 'servidor_tecman',
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
    ),
));

/*$app->get('/create-db', function (Silex\Application $app) {
    $file = fopen(__DIR__ . '/../data/jrhf_web.sql', 'r');
    while ($line = fread($file, 4096)) {
        $app['db']->executeQuery($line);
    }
    fclose($file);
    return "Tabelas criadas";
});*/

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

/**
 * @todo CRUD Pessoas
 */
$app->get('api/pessoas', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM pessoas";
    $id = (int)$request->get('id');
    $atividades = (int)$request->get('atv'); // usado no select do form usuarios
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    if ($atividades > 0) { // para trazer somente colaboradores
        $query .= " WHERE atividades LIKE concat('%', ? , '%') ";
        array_push($params, $atividades);
    }
    $qr = (int)$request->get('qr');
    if ($qr > 0) { // http://app.tecman.com/api/pessoas?qr=1
        $qr = "SELECT id, nome FROM pessoas";
        $result = $db->fetchAll($qr, $params);
        return $app->json($result);        
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

/**
 * @todo CRUD Tipos Documentos
 */
$app->get('api/tdocumentos', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
   $db = $app['db'];
    $query = "SELECT * FROM tipos_documentos";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/tdocumentos/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('tipos_documentos', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM tipos_documentos WHERE id = ?", [$id]);
    return $app->json($row);

});

$app->post('api/tdocumentos/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('tipos_documentos', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM tipos_documentos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/tdocumentos/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('tipos_documentos', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});


/**
 * @todo CRUD Plano Gerencial
 */
$app->get('api/pcg', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM plano_gerencial";
    $id = (int) $request->get('id');
    $params = [];
    if($id > 0){
        $query .= " WHERE id = ?";
        array_push($params,$id);
    }
    $result = $db->fetchAll($query,$params);
    return $app->json($result);
});

$app->post('api/pcg/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('plano_gerencial', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM plano_gerencial WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/pcg/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('plano_gerencial', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM plano_gerencial WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/pcg/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('plano_gerencial', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * @todo CRUD Plano Gerencial Grupos
 */
$app->get('api/pcgg', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM plano_gerencial_grupos";
    $id = (int) $request->get('id');
    $params = [];
    if($id > 0){
        $query .= " WHERE id = ?";
        array_push($params,$id);
    }
    $result = $db->fetchAll($query,$params);
    return $app->json($result);
});

$app->post('api/pcgg/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('plano_gerencial_grupos', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM plano_gerencial_grupos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/pcgg/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('plano_gerencial_grupos', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM plano_gerencial_grupos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/pcgg/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('plano_gerencial_grupos', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * @todo CRUD Plano Contábil
 */
$app->get('api/pcc', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM plano_contabil";
    $id = (int) $request->get('id');
    $params = [];
    if($id > 0){
        $query .= " WHERE id = ?";
        array_push($params,$id);
    }
    $result = $db->fetchAll($query,$params);
    return $app->json($result);
});

$app->post('api/pcc/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('plano_contabil', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM plano_contabil WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/pcc/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('plano_contabil', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM plano_contabil WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/pcc/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('plano_contabil', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * @todo CRUD Plano Contábil Grupos
 */
$app->get('api/pccg', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM plano_contabil_grupos";
    $id = (int) $request->get('id');
    $params = [];
    if($id > 0){
        $query .= " WHERE id = ?";
        array_push($params,$id);
    }
    $result = $db->fetchAll($query,$params);
    return $app->json($result);
});

$app->post('api/pccg/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('plano_contabil_grupos', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM plano_contabil_grupos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/pccg/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('plano_contabil_grupos', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM plano_contabil_grupos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/pccg/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('plano_contabil_grupos', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * @api CRUD Bancos
 */
$app->get('api/bancos', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM bancos";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/bancos/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('bancos', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM bancos WHERE id = ?", [$id]);
    return $app->json($row);

});

$app->post('api/bancos/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('bancos', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM bancos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/bancos/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('bancos', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * @api CRUD Agencias
 */
$app->get('api/agencias', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM bancos_agencias";
    $id = (int)$request->get('id');
    $banco = (int)$request->get('banco');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    if ($banco > 0) {
        $query .= " WHERE id_banco = ?";
        array_push($params, $banco);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/agencias/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('bancos_agencias', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM bancos_agencias WHERE id = ?", [$id]);
    return $app->json($row);

});

$app->post('api/agencias/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('bancos_agencias', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM bancos_agencias WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/agencias/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('bancos_agencias', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * @api CRUD Dados Bancarios
 */
$app->get('api/dados-bancarios', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM pessoas_dados_bancarios";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});
/**
 * @uses /view for give data pre defined
 */
$app->get('api/dados-bancarios/view', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT
                  pdb.id,
                  b.nome AS banco,
                  ba.nome AS agencia,
                  pdb.numero,
                  pdb.cedente                  
                FROM
                  pessoas_dados_bancarios pdb,
                  bancos b,
                  bancos_agencias ba
                WHERE pdb.id_agencia = ba.id
                AND   pdb.id_banco = b.id";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " AND pdb.id_pessoa = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/dados-bancarios/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('pessoas_dados_bancarios', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM pessoas_dados_bancarios WHERE id = ?", [$id]);
    return $app->json($row);

});

$app->post('api/dados-bancarios/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('pessoas_dados_bancarios', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM pessoas_dados_bancarios WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/dados-bancarios/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('pessoas_dados_bancarios', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * @api CRUD Card Enderecos
 */
$app->get('api/enderecos', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM pessoas_enderecos";
    $id = (int)$request->get('id');
    $id_pessoa = (int)$request->get('id_pessoa');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    if ($id_pessoa > 0) {
        $query = "SELECT  pe.*,
                          CONCAT(cd.nome,' / ', uf.uf_nome) AS cidade
                  FROM
                    pessoas_enderecos pe,
                    estados uf,
                    cidades cd
                  WHERE pe.id_pessoa = ?
                  AND   pe.id_estado = uf.id
                  AND   pe.id_cidade = cd.id";
        array_push($params, $id_pessoa);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/enderecos/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('pessoas_enderecos', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM pessoas_enderecos WHERE id = ?", [$id]);
    return $app->json($row);

});

$app->post('api/enderecos/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('pessoas_enderecos', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM pessoas_enderecos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/enderecos/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('pessoas_enderecos', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * @api TAB Colaborador
 */

// Departamento

$app->get('api/departamento', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM pessoas_departamentos";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/departamento/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('pessoas_departamentos', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM pessoas_departamentos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/departamento/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('pessoas_departamentos', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM pessoas_departamentos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/departamento/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('pessoas_departamentos', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

// Setor

$app->get('api/setor', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM pessoas_setores";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/setor/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('pessoas_setores', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM pessoas_setores WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/setor/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('pessoas_setores', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM pessoas_setores WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/setor/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('pessoas_setores', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

// Cargos

$app->get('api/cargo', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM pessoas_cargos";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/cargo/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('pessoas_cargos', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM pessoas_cargos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/cargo/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('pessoas_cargos', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM pessoas_cargos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/cargo/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('pessoas_cargos', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * @api Parametros do Sistema
 */
// Form new user

$app->get('api/usuarios', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM usuarios";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/usuarios/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('usuarios', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM usuarios WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/usuarios/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('usuarios', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM usuarios WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/usuarios/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('usuarios', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * Colaboradores Exames Periódicos
 */
$app->get('api/exames', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM pessoas_exames";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});


$app->post('api/exames/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('pessoas_exames', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM pessoas_exames WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/exames/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('pessoas_exames', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM pessoas_exames WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/exames/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('pessoas_exames', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * Colaboradores Treinamentos
 */
$app->get('api/treinamentos', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM pessoas_treinamentos";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});


$app->post('api/treinamentos/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('pessoas_treinamentos', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM pessoas_treinamentos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/treinamentos/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('pessoas_treinamentos', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM pessoas_treinamentos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/treinamentos/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('pessoas_treinamentos', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * Colaboradores Férias
 */
$app->get('api/ferias', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM pessoas_ferias";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/ferias/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('pessoas_ferias', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM pessoas_ferias WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/ferias/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('pessoas_ferias', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM pessoas_ferias WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/ferias/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('pessoas_ferias', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * Colaboradores Afastamentos
 */
$app->get('api/afastamentos', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM pessoas_afastamentos";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/afastamentos/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('pessoas_afastamentos', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM pessoas_afastamentos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/afastamentos/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('pessoas_afastamentos', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM pessoas_afastamentos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/afastamentos/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('pessoas_afastamentos', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * Colaboradores Dependentes
 */
$app->get('api/dependentes', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM pessoas_dependentes";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/dependentes/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('pessoas_dependentes', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM pessoas_dependentes WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/dependentes/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('pessoas_dependentes', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM pessoas_dependentes WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/dependentes/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('pessoas_dependentes', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * @api Cadastros Empresa
 */

$app->get('api/empresas', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM empresas";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/empresas/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('empresas', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM empresas WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/empresas/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('empresas', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM empresas WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/empresas/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('empresas', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});

/**
 * @api Cadastros Filiais
 */

$app->get('api/filiais', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM filiais";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/filiais/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('filiais', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM filiais WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/filiais/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('filiais', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM filiais WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/filiais/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('filiais', ['id' => $id]);
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

    /*$response = new Response();
    $response->headers->set('WWW-Authenticate', sprintf('Basic realm="%s"', 'site_login'));
    $response->setStatusCode(401, 'Please sign in.');
    return $response;*/
    return $app->redirect('/login');
});


/***************************************************/
// @todo app-run();
/***************************************************/

$app->run();

