<?php
declare(strict_types=1);
/**
 * @author Mauro Joaquim Miranda <mauro.miranda@solluzi.com.br>
 * @license MIT
 * @package category
 * @copyright 2018 Solluzi Soluções Integradas
 */

// Carrega o roteador
require_once "lib/router/AltoRouter.php";

// Autoload Composer
require dirname(__DIR__) . '/vendor/autoload.php';

// carregas as classes de todas as paginas
spl_autoload_register( function ($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});


// Chama a rota
$router = new AltoRouter();
$router->setBasePath('/v1');

// Home
$router->map( 'GET', '/',  'App\Controller\HomeController#index');

$match = $router->match();
list( $controller, $action ) = explode( '#', $match['target'] );

if ( is_callable(array($controller, $action)) ) {

    $obj = new $controller();
    call_user_func_array(array($obj,$action), array($match['params']));

} else if ($match['target']==''){
    echo 'Error: Pagina não encontrada'; 
} else {
    echo 'Error: Não pode chamar '.$controller.'#'.$action; 
}