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
    $query = "SELECT u.id,
              u.nome,
              u.email,
              u.perfil,
              u.nivel,
              u.status,
              u.cpf,
              u.observacoes
            FROM usuarios u ";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE u.id = ?";
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
