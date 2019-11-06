<?php
declare (strict_types = 1);
namespace Controller;
class Response
{
    static function json($data, $code)
    {
        http_response_code($code);
        header('Content-type: application/json');
        $resposta = json_encode($data, 1);
        echo $resposta;
    }
}