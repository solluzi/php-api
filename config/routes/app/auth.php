<?php
$router->map(
    'GET|POST',
    '/login',
<<<<<<< HEAD
    'App\Controller\LoginController@auth'
=======
    'App\Middleware\Auth\Login@auth'
>>>>>>> b90c120a6682d1886c49803ad92ddd4da1bf69a0
);
$router->map(
    'GET',
    '/logout',
<<<<<<< HEAD
    'App\Controller\LoginController@logout'
=======
    'App\Middleware\Login\Login@logout'
>>>>>>> b90c120a6682d1886c49803ad92ddd4da1bf69a0
);
