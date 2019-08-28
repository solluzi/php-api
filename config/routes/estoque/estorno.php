<?php
$router->map('GET|POST', '/estoque/estorno/add', 'Estoque\Controller\HistoricoMovimentoController@post');
$router->map('GET|POST', '/estoque/estorno/get', 'Estoque\Controller\HistoricoMovimentoController@get');
$router->map('GET', '/estoque/estorno/get/[i:id]', 'Estoque\Controller\HistoricoMovimentoController@get');
$router->map('GET', '/estoque/estorno/[i:page]/get', 'Estoque\Controller\HistoricoMovimentoController@get');
