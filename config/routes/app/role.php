<?php
$router->map('GET|POST', '/app/role/add', 'App\Controller\RoleController@post');
$router->map('GET|POST', '/app/role/get', 'App\Controller\RoleController@get');
$router->map('GET', '/app/role/get/[i:id]', 'App\Controller\RoleController@get');
$router->map('GET', '/app/role/[i:page]/get', 'App\Controller\RoleController@get');
$router->map('GET|PUT', '/app/role/[i:id]/put', 'App\Controller\RoleController@post');
$router->map('GET|DELETE', '/app/role/[i:id]/delete', 'App\Controller\RoleController@delete');
