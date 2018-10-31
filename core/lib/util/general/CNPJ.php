<?php
declare(strict_types=1);

namespace core\lib\util\general;

final class CNPJ
{
    public static function pontuado( $value ) : string
    {
        $primeiro = substr( $value, 0, 2 );
        $segundo  = substr( $value, 2, 3 );
        $terceiro = substr( $value, 5, 3 );
        $quarto   = substr( $value, 8, 4 );
        $quinto   = substr( $value, 12, 2 );
        return "{$primeiro}.{$segundo}.{$terceiro}/{$quarto}-{$quinto}";
    }

    public static function naoPontuado( $value ) : string
    {
        return preg_replace('/[^0-9]/', '', $value);
    }
}