<?php
declare(strict_types=1);
/**
 * @author Mauro Joaquim Miranda <mauro.miranda@solluzi.com.br>
 * @license MIT
 * @package category
 * @copyright 2018 Solluzi Soluções Integradas
 */
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Credentials:true');
header("Access-Control-Allow-Origin: ".getenv('APP_URL'));
header("Access-Control-Allow-Headers: token, Content-Type");
header("Access-Control-Expose-Headers: Content-Length, X-JSON");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");


########################## Carrega o roteador ###############################
require_once "core/lib/router/AltoRouter.php";

########################## Autoload Composer ################################

require __DIR__ . '/vendor/autoload.php';

########################## carregas as classes de todas as paginas ##########
spl_autoload_register(function ($className) {

    $className = ltrim($className, '\\');
    $fileName = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }

    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});


########################## Instancia a Classe AltoRouter ##################
$router = new AltoRouter();
$router->setBasePath('/v1');

########################## Rotas APP ######################################
require_once 'config/routes/app/home.php';       // Home

######################### Validação as Rotas ##############################
$match = $router->match();
if ($match) {
    //$route = explode('@', $match['target']);
    list($controller, $action) = explode('@', $match['target']);
    is_callable(array($controller, 'handle'));
    $obj = new $controller();
    call_user_func_array(array($obj, $action), array($match['params']));
} else if ($match['target'] == '') {
    http_response_code(404);
} else {
    http_response_code(404);
}
