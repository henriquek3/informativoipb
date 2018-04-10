<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 09/04/2018
 * Time: 20:47
 */


use Symfony\Component\HttpFoundation\Request;

$app->get('api/restatisticas', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM relatorios_estatisticas";
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
    $db->insert('relatorios_estatisticas', $data);
    $id = $db->lastInsertId();
    $row = $db->fetchAssoc("SELECT * FROM relatorios_estatisticas WHERE id = ?", [$id]);
    return $app->json($row);

});

$app->post('api/rconselhos/update', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    unset($data['id']);
    $db->update('relatorios_estatisticas', $data, ['id' => $id]);
    $row = $db->fetchAssoc("SELECT * FROM relatorios_estatisticas WHERE id = ?", [$id]);
    return $app->json($row);
});

$app->post('api/rconselhos/delete', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $data = $request->request->all();
    $id = $data['id'];
    $result = $db->delete('relatorios_estatisticas', ['id' => $id]);
    return $app->json(['success' => $result != 0], $result != 0 ? 200 : 400);
});