<?php
declare(strict_types=1);
/**
 * @author Name <email@email.com>
 * @package category
 * @license MIT
 * @copyright 2018 Name
 *
 * classe SqlInstruction
 * Esta classe provê os métodos em comum entre todas as instruções
 * SQL ( SELECT, INSERT, DELETE e UPDATE )
 */
namespace Db;

use Db\Criteria;

abstract class SqlInstruction
{
    protected $sql;         // armazena a instrução SQL
    protected $criteria;    // armazena o objeto criterio
    protected $entity;

    /**
     * método setEntity()
     *  define o nome da entidade (tabela) manipulada pela instrução SQL
     * @param mixed $entity = tabela
     */
    final public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    /**
     * método getEntity()
     * retorna o nome da entidade (tabela)
     */
    final public function getEntity()
    {
        return $this->entity;
    }

    /**
     * método setCriteria()
     * Define um criterio de seleção dos dados através da composição de um objeto
     * do tipo Criteria, que oferece uma interface para definição de criterios
     * @param mixed $criteria = objeto do tipo Criteria
     */
    public function setCriteria(Criteria $criteria)
    {
        $this->criteria = $criteria;
    }

    /**
     * método getInstruction()
     * declarando-o como <abstract> obrigamos sua declaração nas classes filhas,
     * uma vez que seu comportamento será distinto em cada uma delas, configurando polimorfismo.
     */
    abstract public function getInstruction();
}
