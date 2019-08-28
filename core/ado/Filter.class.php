<?php
declare (strict_types = 1);
/**
 * classe Filter
 *  Esta classe provê uma interface para definição de filtros de seleção
 * @author Name <email@email.com>
 * @package category
 * @license MIT
 * @copyright 2018 Name
 */
namespace Db;

use Db\Expression;

class Filter extends Expression
{
    private $variable; // variavel
    private $operator; // operador
    private $value;    // valor
    /**
     * método __construct()
     *  instancia um novo filtro
     * @param mixed $variable = variável
     * @param mixed $operator = operador (>,<)
     * @param mixed $value    = valor a ser comparado
     */
    public function __construct($variable, $operator, $value)
    {
        // armazena as propriedades
        $this->variable = $variable;
        $this->operator = $operator;
        // transforma o valor de acordo com certas regras
        // antes de atribuir a popriedade a $this->value
        $this->value = $this->transform($value);
    }

    /**
     * método transform()
     *  recebe um valor e faz as modificações necessárias
     *  para ele ser interpretado pelo banco de dados
     *  podendo ser um integer/string/boolean ou array
     * @param mixed $value = valor a ser transformado
     */
    public function transform($value)
    {
        // caso seja um array
        if (is_array($value)) {
            // percorre os valores
            foreach ($value as $x) {
                // se for inteiro
                if (is_integer($x)) {
                    $foo[] = $x;
                } elseif (is_string($x)) {
                    // se for string, adiciona aspas
                    $foo[] = "'$x'";
                }
            }
            // converte o array em string separadas por ","
            $result = '(' . implode(',', $foo) . ')';
        }
        // caso seja uma string
        elseif (is_string($value)) {
            // adiciona aspas
            $result = "'$value'";
        }

        // caso seja um valor nulo
        elseif (is_null($value)) {
            // armazena NULL
            $result = 'NULL';
        }

        // caso seja booleano
        elseif (is_bool($value)) {
            // armazena TRUE ou FALSE
            $result = $value ? 'TRUE' : 'FALSE';
        } else {
            $result = $value;
        }
        // retorna o valor
        return $result;
    }

    public function dump()
    {
        //concatena a expressão
        return "{$this->variable} {$this->operator} {$this->value}";
    }
}
