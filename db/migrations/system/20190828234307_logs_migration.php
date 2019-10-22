<?php

use Phinx\Migration\AbstractMigration;

class LogsMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('logs');
        $table
            ->addColumn('documento_id'      , 'integer',  [ 'null' => true ])
            ->addColumn('time_stamp'        , 'datetime')
            ->addColumn('funcao'            , 'string' , ['limit' => 45])
            ->addColumn('criacao'           , 'datetime')
            ->addColumn('criador'           , 'integer',  [ 'null' => true ])
            ->addColumn('alteracao'         , 'datetime', [ 'null' => true ])
            ->addColumn('alterador'         , 'integer' ,  [ 'null' => true ] )
            ->addForeignKey('documento_id'  , 'documento'   , 'id', [ 'delete' => 'SET_NULL',   'update' => 'NO_ACTION' ] )
            ->addForeignKey('criador'       , 'usuarios'    , 'id', [ 'delete' => 'SET_NULL',   'update' => 'NO_ACTION' ] )
            ->addForeignKey('alterador'     , 'usuarios'    , 'id', [ 'delete' => 'SET_NULL',   'update' => 'NO_ACTION' ] )
            ->create();
    }
}