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
                ui.nome as 'user_inclusao',
                  ua.nome as 'user_alteracao',
                  u.*,
                  -- p.id,
                  i.id as 'id_igreja',
                  p2.id as 'id_presbiterio',
                  s.id as 'id_sinodo'
                FROM USUARIOS U
                  LEFT JOIN USUARIOS AS UI ON UI.ID = U.USUARIO_INCLUSAO
                  LEFT JOIN USUARIOS AS UA ON UA.ID = U.USUARIO_ALTERACAO
                  LEFT JOIN PRESBITEROS P ON U.ID_PRESBITERO = P.ID
                  LEFT JOIN IGREJAS I ON P.ID_IGREJA = I.ID
                  LEFT JOIN PRESBITERIOS P2 ON I.ID_PRESBITERIO = P2.ID
                  LEFT JOIN SINODOS S ON P2.ID_SINODO = S.ID";
    $id = (int)$request->get('id');
    $params = [];
    if ($id > 0) {
        $query .= " RIGHT JOIN usuarios as usr on usr.id = ?";
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
