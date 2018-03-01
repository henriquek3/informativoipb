<?php
/**
 * Created by PhpStorm.
 * User: jeanfreitas
 * Date: 24/02/2018
 * Time: 08:02
 */

$app->get('/{routes}', 
    function ($routes) {
        ob_start();        
        $file = __DIR__ . "/../templates/{$routes}.html";
        if ( file_exists($file) ) {
            include $file;
            return ob_get_clean();
        } elseif ($routes == 'inicio') {
            include __DIR__ . '/../templates/index.html';
            return ob_get_clean();
        } else {
            include __DIR__ . '/../templates/page-error.html';
            return ob_get_clean();
        }
    return true;
});