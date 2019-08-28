<?php

namespace Controller;

use Session\JWTWrapper;

abstract class Middleware
{
    private $jwt;
    public function json($data)
    {
        header('Content-type: application/json');
        $resposta = json_encode($data, true);
        echo $resposta;
    }

    public function formData()
    {
        $data = json_decode(file_get_contents("php://input"));
        return $data;
    }

    public function isLogged()
    {
        $authorization = getallheaders();
        (isset($authorization['Authorization'])) ? list($this->jwt) = scanf($authorization['Authorization'], 'Bearer %s') : null;
        if ($this->jwt) {
            return JWTWrapper::decode($this->jwt);
            exit;
        } else {
            echo json_encode(['msg' => 'Unauthorized']);
            exit;
        }
    }

    public function validate(array $options)
    {
        # code...
    }
}
