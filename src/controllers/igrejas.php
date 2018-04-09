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
    $query = "select
                  i.*,
                  p.sigla as presbiterio,
                  s.sigla as sinodo,
                  u.nome  as user_inclusao,
                  u2.nome as user_alteracao
                from igrejas i
                  left join presbiterios p on i.id_presbiterio = p.id
                  left join sinodos s on i.id_sinodo = s.id
                  left join usuarios u on i.usuario_inclusao = u.id
                  left join usuarios u2 on i.usuario_alteracao = u2.id";
    $id = (int)$request->get('id');
    $presbiterio = (int)$request->get('presbiterio');
    $params = [];
    if ($id > 0) {
        $query .= " WHERE i.id = ?";
        array_push($params, $id);
    }
    if ($presbiterio > 0) {
        $query .= " WHERE i.id_presbiterio = ?";
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
