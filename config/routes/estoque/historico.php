<?php
$router->map('GET|POST', '/estoque/entrada/add', 'Estoque\Controller\HistoricoMovimentoController@post');
$router->map('GET|POST', '/estoque/entrada/get', 'Estoque\Controller\HistoricoMovimentoController@get');
$router->map('GET|POST', '/estoque/estoque/estoque', 'Estoque\Controller\HistoricoMovimentoController@getHistory');
$router->map('GET', '/estoque/entrada/get/[i:id]', 'Estoque\Controller\HistoricoMovimentoController@get');
$router->map('GET', '/estoque/entrada/[i:page]/get', 'Estoque\Controller\HistoricoMovimentoController@get');
