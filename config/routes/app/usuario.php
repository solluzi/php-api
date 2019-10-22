<?php

$router->map('GET|POST', '/usuario', 'App\Controller\UsuarioController@read');
$router->map('GET|POST', '/usuario/[i:id]/edicao', 'App\Controller\UsuarioController@edit');
$router->map('GET|POST', '/usuario/cadastro', 'App\Controller\UsuarioController@create');