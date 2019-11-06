<?php
declare(strict_types = 1);
/**
 * @author Name <email@email.com>
 * @license MIT
 * @package category
 * @copyright 2018 Name
 */

namespace Db;

abstract class Expression
{
    // operadores logicos
    const AND_OPERATOR = ' AND ';
    const OR_OPERATOR = ' OR ';

    // marca metodo dump como obrigatório
    abstract public function dump();
}
