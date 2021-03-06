<?php
declare(strict_types=1);
namespace Db;

/**
 * @author Name <email@email.com>
 * @license MIT
 * @package category
 * @copyright 2018 Name
 *
 * classe SqlUpdate
 * Esta classe provê meios para manipulação de uma instrução de UPDATE no banco de dados
 */

 use Db\SqlInstruction;

final class SqlUpdate extends SqlInstruction
{
    private $columnValues;
    /**
     * método setRowData()
     * Atribui valores á determinadas colunas no banco de dados que serão modificadas
     * @param mixed $column = coluna da tabela
     * @param mixed $value = valor a ser armazenado
     */
    public function setRowData($column, $value)
    {
        // verifica se é um dado escalar (string, inteiro,...)
        if (is_scalar($value)) {
            if (is_string($value) and (!empty($value))) {
                // adiciona \ em aspas
                $value = addslashes($value);

                // caso seja uma string
                $this->columnValues[$column] = "'$value'";
            } elseif (is_bool($value)) {
                // caso seja um boolean
                $this->columnValues[$column] = $value ? 'TRUE' : 'FALSE';
            } elseif ($value!=='') {
                // caso seja outro tipo de dado
                $this->columnValues[$column] = $value;
            } else {
                // caso seja NULL
                $this->columnValues[$column] = "NULL";
            }
        }
    }
    /**
     * método getInstruction()
     * retorna a instrução de UPDATE em forma de string
     */
    public function getInstruction()
    {
        // monta a string de UPDATE
        $this->sql = "UPDATE {$this->entity}";
        // monta os pares: coluna=valor,...
        if ($this->columnValues) {
            foreach ($this->columnValues as $column => $value) {
                $set[] = "{$column} = {$value}";
            }
        }
        $this->sql .= ' SET ' . implode(',', $set);
        // retorna a cláusula WHERE do objeto $this->criteria
        if ($this->criteria) {
            $this->sql .= ' WHERE ' . $this->criteria->dump();
        }
        return $this->sql;
    }
}
