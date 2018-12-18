<?php
declare(strict_types=1);

namespace core\lib\util\general;

final class CEP
{
    public static function pontuado( $value ) : string
    {
        $primeiro = substr( $value, 0, 5);
        $segundo  = substr( $value, 5, 3);
        return "{$primeiro}-{$segundo}";
    }

    public static function naoPontuado( $value ) : string
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
}