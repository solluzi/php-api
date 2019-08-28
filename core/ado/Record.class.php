<?php

declare(strict_types=1);
/**
 * @author Name <email@email.com>
 * @license MIT
 * @package category
 * @copyright 2018 Name
 *
 * classe Record
 * Esta classe provê os métodos necessários para persistir e
 * recuperar objetos da base de dados ( Active Record )
 */

namespace Db;

use Db\SqlInsert;
use Db\SqlUpdate;
use Db\Criteria;
use Db\Filter;
use Db\Transaction;
use Db\SqlSelect;
use Db\SqlDelete;

abstract class Record
{
    protected $data;   // array contendo os dados do objeto

    /**
     * método __construct()
     * instancia um Active Record. se passado o $id
     * @param [$id] = ID do objeto
     */
    public function __construct($id = null)
    {
        if ($id) { // se o ID for informado
            // carrega o objeto correspondente
            $object = $this->load($id);
            if ($object) {
                $this->fromArray($object->toArray());
            }
        }
    }

    /**
     * método __clone()
     * executado quando o objeto for clonado.
     * limpa o ID para que seja gerado um ID para o clone
     */
    public function __clone()
    {
        unset($this->id);
    }

    /**
     * metodo __set()
     * executado sempre que uma propriedade for atribuida
     */
    public function __set($prop, $value)
    {
        // verifica se existe método set_<propriedade>
        if (method_exists($this, 'set_' . $prop)) {
            // executa o metodo set_<propriedade>
            call_user_func([$this, 'set_' . $prop], $value);
        } else {
            if ($value === null) {
                unset($this->data[$prop]);
            } else {
                // atribui o valor da propriedade
                $this->data[$prop] = $value;
            }
        }
    }

    /**
     * método __get()
     * executado sempre que uma propriedade for requerida
     */
    public function __get($prop)
    {
        // verifica se existe método get_<propriedade>
        if (method_exists($this, 'get_' . $prop)) {
            return call_user_func([$this, 'get_' . $prop]);
        } else {
            // retorna o valor da propriedade
            if (isset($this->data[$prop])) {
                return $this->data[$prop];
            }
        }
    }

    /**
     * método getEntity()
     * retorna o nome da entidade (tabela)
     */
    private function getEntity()
    {
        // obtem o nome da classe
        $class = get_class($this);
        // retorna a constante classe TABLENAME
        return constant("{$class}::TABLENAME");
    }

    /**
     * método fromArray
     * preenche os dados do objeto com um array
     */
    public function fromArray($data)
    {
        $this->data = $data;
    }

    /**
     * método toArray()
     * retorna os dados do objeto como array
     */
    public function toArray()
    {
        return $this->data;
    }

    /**
     * método store()
     * armazena o objeto na base de dados e retorna
     * o numero de linhas afetadas pela instrução SQL (zero ou um)
     */
    public function store()
    {
        // verifica se tem ID ou se existisse na base de dados
        if (empty($this->data['id']) or (!$this->load($this->id))) {
            // incrementa o ID
            if (empty($this->data['id'])) {
                $this->id = $this->getLast() + 1;
            }
            // cria uma instrução de insert
            $sql = new SqlInsert;
            $sql->setEntity($this->getEntity());
            // percorre os dados do objeto
            foreach ($this->data as $key => $value) {
                // passa os dados do objeto para SQL
                $sql->setRowData($key, $this->$key);
            }
        } else {
            // instancia a instrução de de update
            $sql = new SqlUpdate;
            $sql->setEntity($this->getEntity());
            // cria um criterio de seleção baseado no ID
            $criteria = new Criteria;
            $criteria->add(new Filter('id', '=', $this->id));
            $sql->setCriteria($criteria);
            // percorre os dados do objeto
            foreach ($this->data as $key => $value) {
                if ($key !== 'id') { // o ID não precisa ir no UPDATE
                    // passa os dados do objeto para o SQL
                    $sql->setRowData($key, $this->$key);
                }
            }
        }
        // obtem transação ativa
        if ($conn = Transaction::get()) {
            // faz o log e executa o SQL
            Transaction::log($sql->getInstruction());
            $result = $conn->exec($sql->getInstruction());
            // retorna o resultado
            return $result;
        } else {
            // se não tiver transação, retorna uma exceção
            throw new Exception("Não há transação ativa!!");
        }
    }

    /**
     * método load()
     * recupera (retorna) um objeto da base de dados
     * através de seu ID e isnatncia ele na memoria
     * @param mixed $id = ID do objeto
     */
    public function load($id)
    {
        // instancia a instrução de SELECT
        $sql = new SqlSelect();
        $sql->setEntity($this->getEntity());
        $sql->addColumn('*');

        // cria criterio de seleção baseado no ID
        $criteria = new Criteria;
        $criteria->add(new Filter('id', '=', $id));
        // define o criterio de seleção de dados
        $sql->setCriteria($criteria);
        // obtem transação ativa
        if ($conn = Transaction::get()) {
            // cria a mensagem de log e xecuta a consulta
            Transaction::log($sql->getInstruction());
            $result = $conn->Query($sql->getInstruction());
            // se retornou algum dado
            if ($result) {
                // retorna os dados em forma de objeto
                $object = $result->fetchObject(get_class($this));
            }
            return $object;
        } else {
            // se não tiver transação, retorna uma exceção
            throw new \Exception("Não há transação ativa!!");
        }
    }

    /**
     * método delete()
     * exclui um objeto da base de dados através de seu ID
     * @param mixed $id = ID do objeto
     */
    public function delete($id = null)
    {
        // o ID é o parametro ou a propriedade ID
        $id = $id ? $id : $this->id;
        // Instancia uma instrução DELETE
        $sql = new SqlDelete;
        $sql->setEntity($this->getEntity());

        // cria criterio de seleção de dados
        $criteria = new Criteria;
        $criteria->add(new Filter('id', '=', $id));
        // define o criterio de seleção baseado no ID
        $sql->setCriteria($criteria);

        // obtem transação ativa
        if ($conn = Transaction::get()) {
            // faz o log e executa o SQL
            Transaction::log($sql->getInstruction());
            $result = $conn->exec($sql->getInstruction());
            // retorna o resultado
            return $result;
        } else {
            // se não tiver transação, retorna uma exceção
            throw new \Exception("Não há transação ativa!!");
        }
    }

    /**
     * método getLast()
     * retorna o ultimo ID
     */
    private function getLast()
    {
        // inicia transação
        if ($conn = Transaction::get()) {
            // instancia instrução de SELECT
            $sql = new SqlSelect;
            $sql->addColumn('max(ID) as ID');
            $sql->setEntity($this->getEntity());
            // cria log e executa instrução SQL
            Transaction::log($sql->getInstruction());
            $result = $conn->Query($sql->getInstruction());
            // retorna os dados do banco
            $row = $result->fetch();
            return $row[0];
        } else {
            // se não tiver transação, retorna uma exceção
            throw new Exception("Não há transação ativa!!");
        }
    }
}
