<?php
/* $router->addRoutes([
    ['GET|POST', '/app/user/add', 'App\Controller\SystemUserConstroller@post']
]); */

$router->map('GET|POST', '/app/user/add', 'App\Controller\SystemUserController@post');
$router->map('GET|POST', '/app/user/get', 'App\Controller\SystemUserController@get');
$router->map('GET', '/app/user/get/[i:id]', 'App\Controller\SystemUserController@get');
$router->map('GET', '/app/user/[i:page]/get', 'App\Controller\SystemUserController@get');
$router->map('GET|PUT', '/app/user/[i:id]/put', 'App\Controller\SystemUserController@post');
$router->map('GET|POST', '/app/user/disable', 'App\Controller\SystemUserController@inactivate');
$router->map('GET|DELETE', '/app/user/[i:id]/delete', 'App\Controller\SystemUserController@delete');
$router->map('GET|POST', '/app/user/password', 'App\Controller\SystemUserController@postPassword');
$router->map('GET|POST', '/app/user/[i:id]/inactivate', 'App\Controller\SystemUserController@inasctivate');
