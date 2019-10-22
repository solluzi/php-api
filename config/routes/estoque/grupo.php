<?php
$router->map('GET|POST', '/estoque/grupo/add', 'Estoque\Controller\GrupoController@post');
$router->map('GET|POST', '/estoque/grupo/get', 'Estoque\Controller\GrupoController@get');
$router->map('GET', '/estoque/grupo/get/[i:id]', 'Estoque\Controller\GrupoController@get');
$router->map('GET', '/estoque/grupo/[i:page]/get', 'Estoque\Controller\GrupoController@get');
$router->map('GET|PUT', '/estoque/grupo/[i:id]/put', 'Estoque\Controller\GrupoController@post');
$router->map('GET|DELETE', '/estoque/grupo/[i:id]/delete', 'Estoque\Controller\GrupoController@delete');
