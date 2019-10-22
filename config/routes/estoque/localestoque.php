<?php
$router->map('GET|POST', '/estoque/localestoque/add', 'Estoque\Controller\LocalEstoqueController@post');
$router->map('GET|POST', '/estoque/localestoque/get', 'Estoque\Controller\LocalEstoqueController@get');
$router->map('GET', '/estoque/localestoque/get/[i:id]', 'Estoque\Controller\LocalEstoqueController@get');
$router->map('GET', '/estoque/localestoque/[i:page]/get', 'Estoque\Controller\LocalEstoqueController@get');
$router->map('GET|PUT', '/estoque/localestoque/[i:id]/put', 'Estoque\Controller\LocalEstoqueController@post');
$router->map('GET|DELETE', '/estoque/localestoque/[i:id]/delete', 'Estoque\Controller\LocalEstoqueController@delete');
