<?php
$router->map('GET|POST', '/app/preference/add', 'App\Controller\PreferenceController@post');
$router->map('GET|POST', '/app/preference/get', 'App\Controller\PreferenceController@get');
$router->map('GET', '/app/preference/get/[i:id]', 'App\Controller\PreferenceController@get');
$router->map('GET', '/app/preference/[i:page]/get', 'App\Controller\PreferenceController@get');
$router->map('GET|PUT', '/app/preference/[i:id]/put', 'App\Controller\PreferenceController@post');
$router->map('GET|DELETE', '/app/preference/[i:id]/delete', 'App\Controller\PreferenceController@delete');
