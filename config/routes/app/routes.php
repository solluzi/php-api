<?php
// GUEST SIGNUP & LOGIN
$router->addRoutes(
    [
        ['POST|GET', '/app/signup', 'App\Controller\SignUpController@index'],
        ['POST|GET', '/app/login', 'App\Controller\LoginController@auth'],
        ['POST|GET', '/app/reset-password', 'App\Controller\SignUpController@reset']
    ]
);
