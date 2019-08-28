<?php
$router->map('GET|POST', '/estoque/produto/add', 'Estoque\Controller\ProdutoController@post');
$router->map('GET|POST', '/estoque/produto/get', 'Estoque\Controller\ProdutoController@get');
$router->map('GET', '/estoque/produto/get/[i:id]', 'Estoque\Controller\ProdutoController@get');
$router->map('GET', '/estoque/produto/[i:page]/get', 'Estoque\Controller\ProdutoController@get');
$router->map('GET|PUT', '/estoque/produto/[i:id]/put', 'Estoque\Controller\ProdutoController@post');
$router->map('GET|DELETE', '/estoque/produto/[i:id]/delete', 'Estoque\Controller\ProdutoController@delete');
