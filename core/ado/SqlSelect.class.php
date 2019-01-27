<?php
/**
 * @author Name <email@email.com>
 * @package category
 * @license MIT
 * @copyright 2018 Name
 * classe SqlSelect
 * Esta classe provê meios para manipulação de uma instrução de SELECT no banco de dados
 */
namespace Ado;

use Ado\SqlInstruction;

final class SqlSelect extends SqlInstruction
{
    private $columns;    // array colunas a serem retornadas

    /**
     * método addColumn
     * adiciona uma coluna a ser retornada pelo SELECT
     * @param mixed $column = coluna da tabela
     */
    public function addColumn($column)
    {
        // adiciona a coluna no array
        $this->columns[] = $column;
    }

    /**
     * método getInstruction()
     * retorna a instrução de SELECT em forma de string
     */
    public function getInstruction()
    {
        // monta a instrução de SELECT
        $this->sql = 'SELECT ';
        // monta a string com os nomes das colunas
        $this->sql .= implode(',', $this->columns);
        // adiciona a clausula FROM o nome da tabela
        $this->sql .= ' FROM ' . $this->entity;

        // obtem a clausula FROM o nome da tabela
        if ($this->criteria) {
            $expression = $this->criteria->dump();
            if ($expression) {
                $this->sql .= ' WHERE ' . $expression;
            }
            // obtém as propriedades do critério
            $order = $this->criteria->getProperty('order');
            $limit = $this->criteria->getProperty('limit');
            $offset= $this->criteria->getProperty('offset');

            // obtém a ordenação do SELECT
            if ($order) {
                $this->sql .= ' ORDER BY ' . $order;
            }

            if ($limit) {
                $this->sql .= ' LIMIT ' . $limit;
            }

            if ($offset) {
                $this->sql .= ' OFFSET ' . $offset;
            }
        }
        return $this->sql;
    }
}
