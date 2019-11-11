<?php
declare(strict_types=1);
/**
 * @author Name <email@email.com>
 * @package category
 * @license MIT
 * @copyright 2018 Name
 *
 * classe SqlDelete
 * Esta classe prové meios para manipulação de uma instrução de DELETE no banco de dados
 */
namespace Db;

use Db\SqlInstruction;

final class SqlDelete extends SqlInstruction
{
    /**
     * método getInstruction()
     * retorna a instrução de DELETE em forma de string
     */
    public function getInstruction()
    {
        // monta a string de DELETE
        $this->sql = "DELETE FROM {$this->entity}";

        // retorna a clausula WHERE do objeto $this->criteria
        if ($this->criteria) {
            $expression = $this->criteria->dump();
            if ($expression) {
                $this->sql .= ' WHERE ' . $expression;
            }
        }
        return $this->sql;
    }
}
