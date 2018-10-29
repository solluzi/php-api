<?php
declare(strict_types=1);

namespace App\Controller;

use lib\controller\Controller;

class HomeController extends Controller
{
    private $layout = 'App/View/';    

    public function index()
    {
        $response = [];
        $response['razao']    = "Solluzi :: Soluções Integradas";        
        $response['endereco'] = "Av. Presidente Kennedy, 2511, Sala 10";        
        return $this->view(__NAMESPACE__, 'home::index', $response);
    }    
}
