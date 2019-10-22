<?php
$router->map('GET|POST',    '/empresa',                 'App\Controller\EmpresaController@read');
$router->map('GET|POST',    '/empresa/[i:id]/edicao',   'App\Controller\EmpresaController@edit');
$router->map('GET|POST',    '/empresa/cadastro'    ,    'App\Controller\EmpresaController@create');
$router->map('GET|DELETE',  '/empresa/[i:id]/delete' ,  'App\Controller\EmpresaController@delete');
