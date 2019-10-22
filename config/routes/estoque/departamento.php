<?php
$router->map('GET|POST', '/estoque/departamento/add', 'Estoque\Controller\DepartamentoController@post');
$router->map('GET|POST', '/estoque/departamento/get', 'Estoque\Controller\DepartamentoController@get');
$router->map('GET', '/estoque/departamento/get/[i:id]', 'Estoque\Controller\DepartamentoController@get');
$router->map('GET', '/estoque/departamento/[i:page]/get', 'Estoque\Controller\DepartamentoController@get');
$router->map('GET|PUT', '/estoque/departamento/[i:id]/put', 'Estoque\Controller\DepartamentoController@post');
$router->map('GET|DELETE', '/estoque/departamento/[i:id]/delete', 'Estoque\Controller\DepartamentoController@delete');
