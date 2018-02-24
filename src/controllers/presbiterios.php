<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 24/02/2018
 * Time: 08:16
 */

use Symfony\Component\HttpFoundation\Request;

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
