<?php

declare(strict_types=1);
/**
 * classe Repository
 * esta classe provê os métodos necessários para manipular coleções de objetos.
 */

namespace Db;

use Db\Criteria;
use Db\SqlSelect;
use Db\Transaction;
use Db\SqlDelete;

final class Repository
{
    private $class; // nome da classe manipulada pelo repositorio

    /**
     * método __construct()
     * instancia um repositório de objetos
     * @param mixed $class = Classe dos objetos
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * método load()
     * recuperar um conjunto de objetos (collection) da base de dados
     * através de um critério de seleção, e instancia-los em memoria
     * @param mixed $criteria = objeto do tipo Criteria
     */
    public function load(Criteria $criteria)
    {
        // instancia a instrução SELECT
        $sql = new SqlSelect;
        $sql->addColumn('*');
        $sql->setEntity($this->class::TABLENAME);
        //attribui o criterio passado como parametro
        $sql->setCriteria($criteria);
        
        // Obtem transação ativa
        if ($conn = Transaction::get()) {
            // registra mensagem de log
            Transaction::log($sql->getInstruction());

            // executa a consulta no banco de dados
            $result = $conn->Query($sql->getInstruction());
            $results = [];

            if ($result) {
                // percorre os resultados da consulta, retornando um objeto
                while ($row = $result->fetchObject()) {
                    // armazena no array $results;
                    $results[] = $row;
                }
            }
            
            return $results;
        } else {
            // se não tiver transação, retorna uma exceção
            throw new Exception("Não há transação ativa!!");
        }
    }

    /**
     * método delete()
     * Exclui um conjunto de objetos (collection) da base de dados
     * através de um criterio de seleção
     *
     * @param Criteria $criteria = objeto do tipo Criteria
     * @return void
     */
    public function delete(Criteria $criteria)
    {
        // instancia instrução de DELETE
        $sql = new SqlDelete;
        $sql->setEntity($this->class::TABLENAME);
        // atribui o criterio passado como parametro
        $sql->setCriteria($criteria);

        // obtem transação ativa
        if ($conn = Transaction::get()) {
            // registra mensagem de log
            Transaction::log($sql->getInstruction());
            // executa a instrução de DELETE
            $result = $conn->exec($sql->getInstruction());
            return $result;
        } else {
            // se não tiver transação, retorna uma exceção
            throw new Exception("Não há transação ativa");
        }
    }

    /**
     * método count()
     * Retorna a quantidade de objetos da base de dados
     * que satisfazem um determinado criterio de seleção
     * @param mixed $criteria = objeto do tipo Criteria
     */
    public function count(Criteria $criteria)
    {

        $sql = new SqlSelect;
        $sql->addColumn('count(*)');
        $sql->setEntity($this->class::TABLENAME);
        // atribui o criterio passado como parametro
        $sql->setCriteria($criteria);

        // obtem transação ativa
        if ($conn = Transaction::get()) {
            // registra mensagem de log
            Transaction::log($sql->getInstruction());
            // executa instrução de SELECT
            $result = $conn->Query($sql->getInstruction());
            if ($result) {
                $row = $result->fetch();
            }
            // retorna o resultado
            return $row[0];
        } else {
            // se não tiver transação, retorna uma exceção
            throw new Exception("Não há transação ativa!!");
        }
    }
}
