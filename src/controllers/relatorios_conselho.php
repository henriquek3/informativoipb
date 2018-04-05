<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 04/04/2018
 * Time: 21:55
 */

use Symfony\Component\HttpFoundation\Request;

$app->get('api/rconselhos', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM rconselhos";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE id = ?";
        array_push($params, $id);
    }
    $result = $db->fetchAll($query, $params);
    return $app->json($result);
});

$app->post('api/rconselhos/store', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $db->insert('rconselhos', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM rconselhos WHERE id = ?", [$id]);
    return $app->json($row);

});

$app->post('api/rconselhos/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('rconselhos', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM rconselhos WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/rconselhos/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('rconselhos', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});