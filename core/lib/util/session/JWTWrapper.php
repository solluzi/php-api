<?php
declare (strict_types = 1);
namespace Session;

use Firebase\JWT\JWT;

class JWTWrapper
{
    //const KEY = '7Fsxc2A865V6'; //chave
    //const KEY = getenv('token_key'); //chave
    /**
     * Geração de um novo token jwt
     */
    public static function encode(array $options)
    {
        $issuedAt = time();
        $expire = $issuedAt + $options['expiration_sec']; // tempo de expiração
        $tokenParam = [
            'iat' => $issuedAt,             // timestamp de geração do token
            'iss' => $options['iss'],       // pode ser usado para descartar tokens de outros dominios
            'exp' => $expire,               // expiração do token
            'nbf' => $issuedAt - 1,         // Token não é valido antes de
            'data' => $options['userdata'], // dados do usuário logado
        ];
        return JWT::encode($tokenParam, getenv('token_key'));
    }

    /**
     * decodifica token jwt
     */
    public static function decode($jwt)
    {
        return JWT::decode($jwt, getenv('token_key'), ['HS256']);
    }
}
