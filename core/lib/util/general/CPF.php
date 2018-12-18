<?php
declare(strict_types=1);

namespace core\lib\util\general;

final class CPF
{
    public static function pontuado( $value ) : string
    {
        $primeiro = substr( $value, 0, 3 );
        $segundo  = substr( $value, 3, 3 );
        $terceiro = substr( $value, 6, 3 );
        $quarto   = substr( $value, 9, 2 );
        return "{$primeiro}.{$segundo}.{$terceiro}-{$quarto}";
    }

    public static function naoPontuado( $value ) : string
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
}