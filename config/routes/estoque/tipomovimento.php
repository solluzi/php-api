<?php
$router->map('GET|POST', '/estoque/tipomovimento/add', 'Estoque\Controller\TipoMovimentoController@post');
$router->map('GET|POST', '/estoque/tipomovimento/get', 'Estoque\Controller\TipoMovimentoController@get');
$router->map('GET', '/estoque/tipomovimento/get/[i:id]', 'Estoque\Controller\TipoMovimentoController@get');
$router->map('GET', '/estoque/tipomovimento/[i:page]/get', 'Estoque\Controller\TipoMovimentoController@get');
$router->map('GET|PUT', '/estoque/tipomovimento/[i:id]/put', 'Estoque\Controller\TipoMovimentoController@post');
$router->map('GET|DELETE', '/estoque/tipomovimento/[i:id]/delete', 'Estoque\Controller\TipoMovimentoController@delete');
