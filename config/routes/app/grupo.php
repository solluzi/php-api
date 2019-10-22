<?php

$router->map('GET|POST', '/grupo', 'App\Controller\GrupoController@read');
$router->map('GET|POST', '/grupo/[i:id]/edicao', 'App\Controller\GrupoController@edit');
$router->map('GET|POST', '/grupo/cadastro', 'App\Controller\GrupoController@create');