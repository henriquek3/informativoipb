<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 24/02/2018
 * Time: 08:13
 */

use Symfony\Component\HttpFoundation\Request;

//$app['session']->start();

/**
 * @return string JSON Web Token - JWT
 * @url https://www.youtube.com/watch?v=k3KfK0ZS_FY
 * @author Fabio Vedovelli
 */
function generatorToken()
{
    $key = 'coram-deo';
    $header = [
        'typ' => 'JWT',
        'alg' => 'HS256'
    ];
    $header = json_encode($header);
    $header = base64_encode($header);
    $payload = [
        'iss' => 'http://tecman.servidordiegorohden.com.br',
        'desenvolvedor' => "Jean Henrique Rodrigues de Freitas",
        'email' => "henriquek3@live.com"
    ];
    $payload = json_encode($payload);
    $payload = base64_encode($payload);
    $signature = hash_hmac('sha256', "$header.$payload", $key, true);
    $signature = base64_encode($signature);
    $token = "$header.$payload.$signature";
    return $token;
}

$app->get('api/connect', function (Request $request) use ($app) {
    /** @var \Doctrine\DBAL\Connection $db */
    $db = $app['db'];
    $query = "SELECT * FROM usuarios";
    $user = (string)$request->get('user');
    $pass = (string)$request->get('password');
    $params = [];
    if (is_string($user) > 0) {
        $query .= " WHERE login = ?";
        array_push($params, $user);
    }

    if (is_string($pass) > 0) {
        $query .= " AND password = ?";
        array_push($params, $pass);
    }

    $result = $db->fetchAll($query, $params);

    if (count($result) > 0) {
        $result[0]['token'] = generatorToken();
    }

    return $app->json($result);
});
