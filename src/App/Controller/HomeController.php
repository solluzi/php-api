<?php
/**
 * @author Name <email@email.com>
 * @license MIT
 * @package category
 * @copyright 2018 Name
 */
declare(strict_types=1);

namespace App\Controller;

use Controller\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $response             = [];
        $response['razao']    = "Solluzi::Soluções Integradas";
        $response['endereco'] = "Av. Presidente Kennedy, 2511, Sala 10";
        return $this->json($response);
    }
}
