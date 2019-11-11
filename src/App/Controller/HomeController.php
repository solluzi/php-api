<?php
/**
 * @author Mauro Miranda
 * @license FEATS http://feats.com.br/license-mvc
 * @package app
 * @copyright 2019 Feats
 */
declare (strict_types = 1);

namespace App\Controller;

use Controller\iMiddleware;
use Controller\Response;
use Form\Form;

class HomeController implements iMiddleware
{
    public function __construct()
    {
        //$this->isLogged();
    }

    public function handle()
    {
        $form = new Form();
        $validation = ['teste' => ['min' => 10, 'max' => 11, 'required' => true]];
        $form->validate($validation);
        $response             = [];
        $response['razao']    = "Solluzi::Soluções Integradas";
        $response['endereco'] = "Av. Presidente Kennedy, 2511, Sala 10";
        return Response::json($response, 200);
        
    }
}
