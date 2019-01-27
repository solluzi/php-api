<?php
/**
 * @author Name <email@email.com>
 * @license MIT
 * @package category
 * @copyright 2018 Name
 */

namespace Ado;

abstract class Expression
{
    // operadores logicos
    const AND_OPERATOR = 'AND';
    const OR_OPERATOR  = 'OR';

    // marca metodo dump como obrigatório
    abstract public function dump();
}
