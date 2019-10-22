<?php
declare (strict_types = 1);
/**
 * @author Mauro Miranda <mauro.miranda@solluzi.com.br>
 * @package routes
 * @license https://solluzi.com.br/license
 * @copyright 2019 Solluzi Integração de soluções
 */
$router->map(
    'GET',
    '/app/permission/[i:page]/get',
    'App\Middleware\Permission\GetAll@index'
); // Rota para Paginação

$router->map(
    'GET|POST',
    '/app/permission/get',
    'App\Middleware\Permission\Find@index'
); // Rota para Listagem

$router->map(
    'GET',
    '/app/permission/get/[i:id]',
    'App\Middleware\Permission\FindOneById@index'
); // Rota para Busca de single data

$router->map(
    'GET|DELETE',
    '/app/permission/[i:id]/delete',
    'App\Middleware\Permission\Delete@index'
); // Rota para Exclusão de registro

$router->map(
    'GET|POST',
    '/app/permission/add',
    'App\Middleware\Permission\Create@index'
); // Rota para Cadastro

$router->map(
    'GET|PUT',
    '/app/permission/[i:id]/put',
    'App\Middleware\Permission\Update@index'
); // Rota para Alteração de registro
