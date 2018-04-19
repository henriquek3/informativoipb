<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 28/03/2018
 * Time: 21:49
 */

use Symfony\Component\HttpFoundation\Request;

$app->get('api/presbiteros', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "
SELECT
  p.*,
  i.nome as nome_igreja,
  p2.sigla as presbiterio,
  s.sigla as sinodo

FROM presbiteros p
  LEFT JOIN igrejas i ON p.id_igreja = i.id
  LEFT JOIN presbiterios p2 ON i.id_presbiterio = p2.id
  LEFT JOIN sinodos s ON i.id_sinodo = s.id

";
    $id = (int)$request->get('id');
    $igreja = (int)$request->get('igreja');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE p.id = ?";
        array_push($params, $id);
    }
    if ($igreja > 0) {
        $query .= " WHERE p.id_igreja = ?";
        array_push($params, $igreja);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/presbiteros/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('presbiteros', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM presbiteros WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/presbiteros/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('presbiteros', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM presbiteros WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/presbiteros/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('presbiteros', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});
