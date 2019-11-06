<?php
declare(strict_types = 1);
/**
 * @author Mauro Miranda
 * @package ado
 * @license solluzi.com.br/mvc-license
 * @copyright 2019 Solluzi
 * classe Pagination
 *  Esta classe provê uma interface utilizada para definição de paginação de dados
 */
namespace Db;

class Pagination
{
    private $action;
    private $pageSize;
    private $currentPage;
    private $totalRecords;

    public function __construct()
    {
        $this->pageSize = 10;
    }

    public function setData($action = [])
    {
        $this->action = $action;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    public function setTotalRecords($totalRecords)
    {
        $this->totalRecords = $totalRecords;
    }

    public function pagination()
    {
        return null;
    }
}