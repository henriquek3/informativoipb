<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 26/03/2018
 * Time: 20:47
 */

use Symfony\Component\HttpFoundation\Request;

$app->get('api/usuarios', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT
              uu.nome as user_inclusao,
              uua.nome as user_alteracao,
              u.*
            FROM usuarios u,
            (SELECT u.id, u.nome  FROM usuarios u) uu,
            (SELECT u.id, u.nome  FROM usuarios u) uua
            where u.usuario_lancamento = uu.id
            and u.usuario_ultima_alteracao = uua.id";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " AND u.id = ?";
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
