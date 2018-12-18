<?php
declare(strict_types=1);

namespace core\lib\util\general;

/**
 * @author Name <email@email.com>
 * @package category
 * @license MIT
 */
final class CalculoPercentagem
{
    /**
     * Metodo de porcentagem: Quanto é X% de N?
     *
     * @param [type] $porcentagem
     * @param [type] $total
     * @return void
     */
    public static function porcentagemXn( $porcentagem, $total )
    {
        return ( $porcentagem / 100 ) * $total;
    }

    /**
     * Método de porcentagem: N é X% de N
     *
     * @param [type] $valor
     * @param [type] $total
     * @return void
     */
    public static function porcentagemNx( $valor, $total ): void
    {
        return ( $valor * 100 ) / $total;
    }

    /**
     * Método de porcentagem: N é N% de X
     *
     * @param [type] $parcial
     * @param [type] $porcentagem
     * @return void
     */
    public static function porcentagemNnx( $parcial, $porcentagem )
    {
        return ( $parcial / $porcentagem ) * 100;
    }
}
