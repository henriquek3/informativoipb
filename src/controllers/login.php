<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 24/02/2018
 * Time: 08:13
 */

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/*use \Symfony\Component\HttpFoundation\RedirectResponse;*/


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
        'iss' => 'http://www.jksistemas.com.br',
        'desenvolvedores' => "Jean Freitas e Kallew Pavão",
        'email' => "atendimento@jksistemas.com.br"
    ];
    $payload = json_encode($payload);
    $payload = base64_encode($payload);
    $signature = hash_hmac('sha256', "$header.$payload", $key, true);
    $signature = base64_encode($signature);
    $token = "$header.$payload.$signature";
    return $token;
}

$app->post('api/connect', function (Request $request, Application $app) {
    /** @var \Doctrine\DBAL\Connection $db */
    if ($request->get('email')) {
        $data = $request->request->all();
        $user = (string)$data['email'];
        $pass = (string)$data['password'];
        $db = $app['db'];
        $query = "SELECT
                      U.ID  AS ID_USUARIO,
                      U.STATUS,
                      U.NIVEL,
                      U.PERFIL,
                      U.NOME,
                      U.EMAIL,
                      P.ID  AS ID_PRESBITERO,
                      I.ID  AS ID_IGREJA,
                      P2.ID AS ID_PRESBITERIO,
                      S.ID  AS ID_SINODO
                    FROM
                      USUARIOS U
                      LEFT JOIN PRESBITEROS AS P ON P.ID = U.ID
                      LEFT JOIN IGREJAS I ON P.ID_IGREJA = I.ID
                      LEFT JOIN PRESBITERIOS P2 ON I.ID_PRESBITERIO = P2.ID
                      LEFT JOIN SINODOS S ON P2.ID_SINODO = S.ID";
        $params = [];
        if (is_string($user) > 0) {
            $query .= " RIGHT JOIN USUARIOS AS USR ON USR.ID = ?";
            array_push($params, $user);
        }
        if (is_string($pass) > 0) {
            $query .= " AND u.senha = ?";
            array_push($params, $pass);
        }
        $result = $db->fetchAll($query, $params);
        if (count($result) > 0) {
            $result[0]['token'] = generatorToken();
            /*$app['session']->start();
            $app['session']->set("token", $result[0]['token']);*/
            return $app->json($result);
        } else {
            return new Response('login denied', 401);
        }
        //return $app->json($result);

    } else {
        return new Response('<script type="application/javascript"> function getIP(json) {document.write("Seu Endereço IP foi registrado: ", json.ip);}</script><script type="application/javascript" src="https://api.ipify.org?format=jsonp&callback=getIP"></script>', 404);
    }
});

/*$app->get('api/connect', function (Request $request) use ($app) {
    $desconnect = (int)$request->get('desconnect');

    if ($desconnect > 0) {
        if ($app['session']->has("token")) {
            $app['session']->invalidate();
            return new RedirectResponse('/pre-login');
        }
    }
    $result = '{ name: "resultado", value: "deu certo" }';
    return $app->json($result);
});*/
