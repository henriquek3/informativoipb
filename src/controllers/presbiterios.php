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
    $query = "select
              p.*,
              s.sigla as sinodo,
              u.nome as user_alteracao,
              u2.nome as user_inclusao
            
            from presbiterios p
            left join sinodos s on p.id_sinodo = s.id
            left join usuarios u on p.usuario_alteracao = u.id
            left join usuarios u2 on p.usuario_inclusao = u2.id";
    $id = (int)$request->get('id');
    $sinodo = (int)$request->get('sinodo');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE P.ID = ?";
        array_push($params, $id);
    }
    if ($sinodo > 0) {
        $query .= " WHERE p.id_sinodo = ?";
        array_push($params, $sinodo);
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
