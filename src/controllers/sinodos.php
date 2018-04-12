<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 24/02/2018
 * Time: 08:12
 */

use Symfony\Component\HttpFoundation\Request;

$app->get('api/sinodos', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT
                  s.*,
                  u.nome AS user_alteracao,
                  uu.nome AS user_inclusao
                FROM
                  sinodos s
                LEFT JOIN usuarios AS u ON u.id = s.usuario_alteracao
                LEFT JOIN usuarios AS uu ON uu.id = s.usuario_inclusao";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " RIGHT JOIN usuarios as usr on usr.id = ?";
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