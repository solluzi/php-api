<?php
$router->map('GET',      '/conexaoerp',               'App\Controller\ConexaoErpController@read');
$router->map('GET|POST', '/conexaoerp/[i:id]/edicao', 'App\Controller\ConexaoErpController@edit');
$router->map('GET|POST', '/conexaoerp/cadastro'    ,  'App\Controller\ConexaoErpController@create');
$router->map('GET|DELETE', '/conexaoerp/[i:id]/delete' ,  'App\Controller\ConexaoErpController@delete');
