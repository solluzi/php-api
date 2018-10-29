<?php
namespace util\general;

class CEP
{
    public static function pontuado( $value ) : string
    {
        $primeiro = substr( $value, 0, 5);
        $segundo  = substr( $value, 6, 3);
        return "{$primeiro}-{$segundo}";
    }

    public static function naoPontuado( $value ) : integer
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
}