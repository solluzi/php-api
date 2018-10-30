<?php
namespace ado;

use ado\SqlInstruction;
use ado\Criteria;

/**
 * @author Name <email@email.com>
 * @package category
 * @license MIT
 * @copyright 2018 Name
 */
final class SqlInsert extends SqlInstruction
{
    private $columnValues;
    /**
     * método setRowData()
     * Atribui valores à determinadas colunas no banco de dados que serão inseridas
     * @param mixed $column = coluna tabela
     * @param mixed $value = valor a ser armazenado
     */

    public function setRowData($column, $value)
    {
        // verifica se é um dado escalar (string, inteiro, ...)
        if(is_scalar($value)){
            if (is_string($value) and (!empty($value))) {
                // adiciona \ em aspas
                $value = addslashes($value);
                // caso seja uma string
                $this->columnValues[$column] = "'$value'";
            }
            elseif (is_bool($value)) {
                // caso seja boolean
                $this->columnValues[$column] = $value ? 'TRUE' : 'FALSE';
            }
            elseif ($value!=='') {
                // caso seja outro tipo de dado
                $this->columnValues[$column] = $value;
            }
            else {
                // caso seja NULL
                $this->columnValues[$column] = "NULL";
            }
        }
    }

    /**
     * método setCriteria()
     * não existe no contexto desta classe, logo, irá lançar um erro ser for executado
     */
    public function setCriteria(Criteria $criteria)
    {
        // lança o erro
        throw new Exception("Cannot call setCriteria from " .  __CLASS__);        
    }

    /**
     * método getInstruction()
     * retorna a instrução de INSERT em forma de string.
     */
    public function getInstruction()
    {
        $this->sql = "INSERT INTO {$this->entity} (";
        // monta uma string contendo os nomes das colunas
        $columns = implode(',', array_keys($this->columnValues));
        // monta uma string contendo os valores
        $values = implode(',', array_values($this->columnValues));
        $this->sql .= $columns . ')';
        $this->sql .= " values ({$values})";
        return $this->sql;
    }
}