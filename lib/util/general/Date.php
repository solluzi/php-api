<?php
declare(strict_types=1);

namespace util\general;

class Date
{ 

    /**
     * Transform date from Brazilian format to Us
     *
     * @param [type] $value
     * @return string
     */
    public static function date2br( $value ) : string
    {
        $ano = substr( $value, 0, 4 );
        $mes = substr( $value, 5, 2 );
        $dia = substr( $value, 8, 2 );
        return "{$dia}/{$mes}/{$ano}";
    }

    /**
     * Transform date from Us form to Brazilian
     *
     * @param [type] $value
     * @return string
     */
    public static function date2us( $value ) : string
    {
        $dia = substr( $value, 0, 2 );
        $mes = substr( $value, 3, 2 );
        $ano = substr( $value, 6, 4 );
        return "{$dia}/{$mes}/{$ano}";
    }
}
