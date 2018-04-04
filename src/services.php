<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 24/02/2018
 * Time: 07:58
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use \Silex\Application;

$app->register(new Silex\Provider\SessionServiceProvider());

$app['debug'] = true;
$app['token'] =
    "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93d3cuamtzaXN0ZW1hcy5jb20uYnIiLCJkZXNlbnZvbHZlZ"
    . "G9yZXMiOiJKZWFuIEZyZWl0YXMgZSBLYWxsZXcgUGF2XHUwMGUzbyIsImVtYWlsIjoiYXRlbmRpbWVudG9AamtzaXN0ZW1hcy5jb20uYnI"
    . "ifQ==./Xk6bBHtTa3SXr/YMwx4Yhpa0C/dmqOp2BE4r8oBGl4=";


$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'host' => 'localhost',
        'dbname' => 'jksistem_informativoipb',
        /*'user' => 'jksistem_ipbsys',
        'password' => 'r5758222rA+',*/
        'user' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
    ),
));

$app->error(function (\Exception $e, Request $request, $code) {
    switch ($code) {
        case 404:
            ob_start();
            include __DIR__ . '/../templates/page-error.html';
            return ob_get_clean();
            break;
        case 405:
            $message = "Code http: " . $code . "<br/><hr/>";
            $message .= "Event: " . "<pre>" . $e . "</pre>" . "<hr/>";
            $message .= "Request: " . "<pre>" . $request . "</pre>" . "<br/>";
            break;
        case 500:
            $message = "Code http: " . $code . "<br/><hr/>";
            $message .= "Event: " . "<pre>" . $e . "</pre>" . "<hr/>";
            $message .= "Request: " . "<pre>" . $request . "</pre>" . "<br/>";
            break;
        default:
            $message = 'Exceção não tratada, msg gerada pela linha 54 do App.php' . "<br/>";
            $message .= "Code http: " . $code . "<br/><hr/>";
            $message .= "Event: " . "<pre>" . $e . "</pre>" . "<hr/>";
            $message .= "Request: " . "<pre>" . $request . "</pre>" . "<br/>";
            break;
    }
    return new Response($e->getMessage());
});

/*$app->before(function (Request $request, Application $app) {
    $path = $request->getPathInfo();
    if ($path != "/login" && $path != "/pre-login" && $path != "/api/connect") {
        if (!$app['session']->has("token")) {
            return RedirectResponse::create("/pre-login");
        }
    }
}); */

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});