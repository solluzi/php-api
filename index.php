<?php


declare(strict_types=1);
/**
 * @author Mauro Joaquim Miranda <mauro.miranda@solluzi.com.br>
 * @license MIT
 * @package category
 * @copyright 2018 Solluzi Soluções Integradas
 */
header('Access-Control-Allow-Credentials:true');
<<<<<<< HEAD
header("Access-Control-Allow-Origin: ".getenv('APP_URL'));
header("Access-Control-Allow-Headers: token, Content-Type");
=======
header("Access-Control-Allow-Origin: http://localhost:8000");
//header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
>>>>>>> b90c120a6682d1886c49803ad92ddd4da1bf69a0
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
require_once 'config/routes/app/routes.php';

<<<<<<< HEAD


########################## Rotas APP ######################################
require_once 'config/routes/app/auth.php';       // Login
require_once 'config/routes/app/home.php';       // Home
require_once 'config/routes/app/usuario.php';    // User
require_once 'config/routes/app/empresa.php';    // Empresa
require_once 'config/routes/app/conexaoerp.php'; // Permission
require_once 'config/routes/app/conexaomsg.php'; // Permission
require_once 'config/routes/app/grupo.php'; // Grupo


########################## Rotas Estoque ##################################
#require_once 'config/routes/estoque/departamento.php';  //departamento
#require_once 'config/routes/estoque/grupo.php';         //grupo
#require_once 'config/routes/estoque/unidade.php';       //unidade
#require_once 'config/routes/estoque/tipomovimento.php'; //tipomovimento
#require_once 'config/routes/estoque/localestoque.php';  //localestoque
#require_once 'config/routes/estoque/produto.php';       //produto
#require_once 'config/routes/estoque/estorno.php';       //estorno
#require_once 'config/routes/estoque/historico.php';       //historico*/
=======
########################## Rotas APP ######################################
/*require_once 'config/routes/app/signup.php';
require_once 'config/routes/app/auth.php';       // Login
require_once 'config/routes/app/home.php';       // Home
require_once 'config/routes/app/permission.php'; // Permission
require_once 'config/routes/app/role.php';       // Role
require_once 'config/routes/app/user.php';       // User
require_once 'config/routes/app/preference.php'; // Preference

########################## Rotas Estoque ##################################
require_once 'config/routes/estoque/departamento.php';  //departamento
require_once 'config/routes/estoque/grupo.php';         //grupo
require_once 'config/routes/estoque/unidade.php';       //unidade
require_once 'config/routes/estoque/tipomovimento.php'; //tipomovimento
require_once 'config/routes/estoque/localestoque.php';  //localestoque
require_once 'config/routes/estoque/produto.php';       //produto
require_once 'config/routes/estoque/estorno.php';       //estorno
require_once 'config/routes/estoque/historico.php';       //historico*/
>>>>>>> b90c120a6682d1886c49803ad92ddd4da1bf69a0


######################### Validação as Rotas ##############################
header("Content-Type: application/json; charset=UTF-8");

$match = $router->match();
if ($match) {
    $route = explode('@', $match['target']);
    list($controller, $action) = explode('@', $match['target']);
    is_callable(array($controller, $action));
    $obj = new $controller();
    call_user_func_array(array($obj, $action), array($match['params']));
} else if ($match['target'] == '') {
    echo json_encode(['Error: Pagina não encontrada']);
} else {
    $response = ['code' => '404'];
    echo json_encode($response);
}
