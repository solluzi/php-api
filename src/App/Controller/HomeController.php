<?php
/**
 * @author Mauro Miranda
 * @license FEATS http://feats.com.br/license-mvc
 * @package app
 * @copyright 2019 Feats
 */
declare (strict_types = 1);

namespace App\Controller;

use Controller\Middleware;

class HomeController extends Middleware
{
    public function __construct()
    {
        //$this->isLogged();
    }

    public function index()
    {
        $response             = [];
        $response['razao']    = "Solluzi::Soluções Integradas";
        $response['endereco'] = "Av. Presidente Kennedy, 2511, Sala 10";
        return $this->json($response);
    }
}
