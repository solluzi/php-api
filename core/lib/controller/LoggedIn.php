<?php
declare(strict_types = 1);
namespace Controller;

use Session\JWTWrapper;

class LoggedIn
{
    private $jwt;

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

    public function getUserId()
    {
        $authorization = getallheaders();
        list($jwt) = sscanf($authorization['Authorization'], 'Bearer %s');
        $user = JWTWrapper::decode($jwt);
        return $user->data->id;
    }
}