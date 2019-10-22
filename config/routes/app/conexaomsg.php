<?php
$router->map('GET',      '/conexaomsg',               'App\Controller\ConexaoMensageiroController@read');
$router->map('GET|POST', '/conexaomsg/[i:id]/edicao', 'App\Controller\ConexaoMensageiroController@edit');
$router->map('GET|POST', '/conexaomsg/cadastro'    ,  'App\Controller\ConexaoMensageiroController@create');
$router->map('GET|DELETE', '/conexaomsg/[i:id]/delete' ,  'App\Controller\ConexaoMensageiroController@delete');
