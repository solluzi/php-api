<?php

use Phinx\Migration\AbstractMigration;

class WorkFlowMigration extends AbstractMigration
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
        $table = $this->table('workflow');
        $table
            ->addColumn('documento_id'          , 'integer' )
            ->addColumn('descricao'             , 'text'    )
            ->addColumn('qtd_niveis_aprovacao'  , 'string', [ 'limit'  => 45 ] )
            ->addColumn('valor'                 , 'decimal', [ 'default'=> 0.00, 'null' => false, 'precision' => 10, 'scale' => 2 ] )
            ->addColumn('funcao'                , 'string', [ 'limit'  => 45 ] )
            ->addColumn('conexao_id'            , 'integer',  ['null' => true]  )
            ->addColumn('empresa_id'            , 'integer' )
            ->addColumn('funcao_1'              , 'text', [ 'null' => true ])
            ->addColumn('funcao_2'              , 'text', [ 'null' => true ])
            ->addColumn('funcao_3'              , 'text', [ 'null' => true ])
            ->addColumn('funcao_4'              , 'text', [ 'null' => true ])
            ->addColumn('funcao_5'              , 'text', [ 'null' => true ])
            ->addColumn('funcao_gravacao_1'     , 'text', [ 'null' => true ])
            ->addColumn('funcao_gravacao_2'     , 'text', [ 'null' => true ])
            ->addColumn('funcao_gravacao_3'     , 'text', [ 'null' => true ])
            ->addColumn('funcao_gravacao_4'     , 'text', [ 'null' => true ])
            ->addColumn('validade_workflow'     , 'datetime')
            ->addColumn('criacao'               , 'datetime')
            ->addColumn('criador'               , 'integer',  ['null' => true] )
            ->addColumn('alteracao'             , 'datetime', ['null' => true])
            ->addColumn('alterador'             , 'integer',  ['null' => true])
            ->addForeignKey('documento_id'      , 'documento',  'id', [ 'delete' => 'CASCADE',   'update' => 'NO_ACTION' ] )
            ->addForeignKey('conexao_id'        , 'conexaoerp', 'id', [ 'delete' => 'SET_NULL',  'update' => 'NO_ACTION' ] )
            ->addForeignKey('empresa_id'        , 'empresa',    'id', [ 'delete' => 'CASCADE',   'update' => 'NO_ACTION' ] )
            ->addForeignKey('criador'           , 'usuarios',   'id', [ 'delete' => 'SET_NULL',  'update' => 'NO_ACTION' ] )
            ->addForeignKey('alterador'         , 'usuarios',   'id', [ 'delete' => 'SET_NULL',  'update' => 'NO_ACTION' ] )
            ->create();
    }
}
