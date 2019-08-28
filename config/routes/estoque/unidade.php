<?php
$router->map('GET|POST', '/estoque/unidade/add', 'Estoque\Controller\UnidadeController@post');
$router->map('GET|POST', '/estoque/unidade/get', 'Estoque\Controller\UnidadeController@get');
$router->map('GET', '/estoque/unidade/get/[i:id]', 'Estoque\Controller\UnidadeController@get');
$router->map('GET', '/estoque/unidade/[i:page]/get', 'Estoque\Controller\UnidadeController@get');
$router->map('GET|PUT', '/estoque/unidade/[i:id]/put', 'Estoque\Controller\UnidadeController@post');
$router->map('GET|DELETE', '/estoque/unidade/[i:id]/delete', 'Estoque\Controller\UnidadeController@delete');
