<?php
declare(strict_types = 1);
/**
 * @author Name <email@email.com>
 * @package category
 * @license MIT
 * @copyright 2018 Name
 * classe Criteria
 *  Esta classe provê uma interface utilizada para definição de critérios
 */
namespace Db;

use Db\Expression;

class Criteria extends Expression
{
    private $expressions;   // armazena a lista de expressões
    private $operators;     // armazena a lista de operadores
    private $properties;    // propriedades do criterio

    /**
     * Método Construtor
     */
    public function __construct()
    {
        $this->expressions = [];
        $this->operators = [];
    }

    /**
     * método add()
     *  adiciona uma expressão ao critério
     * @param mixed $expression = expressão ( objeto Expression )
     * @param mixed $operator   = operador lógico de comparação
     */
    public function add(Expression $expression, $operator = self::AND_OPERATOR)
    {
        // na primeira vez, não precisamos de operador lógico para concatenar
        if (empty($this->expressions)) {
            $operator = null;
        }

        // agrega o resultado da expressão à lista de expressões
        $this->expressions[] = $expression;
        $this->operators[] = $operator;
    }

    /**
     * método dump()
     *  retorna a expressão final
     */
    public function dump()
    {
        // concatena a lista de expressões
        if (is_array($this->expressions)) {
            if (count($this->expressions) > 0) {
                $result = '';
                foreach ($this->expressions as $i => $expression) {
                    $operator = $this->operators[$i];
                    // concatena o operador com a respectiva expressão
                    $result .= $operator . $expression->dump() . ' ';
                }
                $result = trim($result);
                return "({$result})";
            }
        }
    }

    /**
     * método setProperty()
     *  define o valor de uma propriedade
     * @param mixed $property = propriedade
     * @param mixed $value    = valor
     */
    public function setProperty($property, $value)
    {
        if (isset($value)) {
            $this->properties[$property] = $value;
        } else {
            $this->properties[$property] = null;
        }
    }

    /**
     * método getProperty()
     *  retorna o valor de uma propriedade
     * @param mixed $property = propriedade
     */
    public function getProperty($property)
    {
        if (isset($this->properties[$property])) {
            return $this->properties[$property];
        }
    }
}
