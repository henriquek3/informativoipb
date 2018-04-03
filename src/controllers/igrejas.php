<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 26/03/2018
 * Time: 22:41
 */


use Symfony\Component\HttpFoundation\Request;

$app->get('api/igrejas', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT p.*, s.sigla AS presbiterio
                FROM igrejas p, presbiterios s
                WHERE p.id_presbiterio = s.id";
    $id = (int)$request->get('id');
    $presbiterio = (int)$request->get('presbiterio');
    $params = [];
    if ($id > 0) {
        $query .= " AND p.id = ?";
        array_push($params, $id);
    }
    if ($presbiterio > 0) {
        $query .= " AND p.id_presbiterio = ?";
        array_push($params, $presbiterio);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/igrejas/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('igrejas', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM igrejas WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/igrejas/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('igrejas', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM igrejas WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/igrejas/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('igrejas', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});
