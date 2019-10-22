<?php

use Phinx\Migration\AbstractMigration;

class UsuariosMigration extends AbstractMigration
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
        $table = $this->table('usuarios');
        $table
            ->addColumn('empresa_id',   'integer')
            ->addColumn('celular',      'string',   [ 'limit' => 20 ] )
            ->addColumn('usuario_sap',  'string',   [ 'limit' => 45 ] )
            ->addColumn('mandante',     'string',   [ 'limit' => 45 ] )
            ->addColumn('nome',         'string',   [ 'limit' => 88 ])
            ->addColumn('sobrenome',    'string',   [ 'limit' => 88 ] )
            ->addColumn('email',        'string',   [ 'limit' => 188] )
            ->addColumn('info_1',       'text',     [ 'null' => true])
            ->addColumn('info_2',       'text',     [ 'null' => true])
            ->addColumn('info_3',       'text',     [ 'null' => true])
            ->addColumn('info_4',       'text',     [ 'null' => true])
            ->addColumn('info_5',       'text',     [ 'null' => true])
            ->addColumn('criacao',      'datetime')
            ->addColumn('criador',      'integer' , [ 'null' => true ] )
            ->addColumn('alteracao',    'datetime', [ 'null' => true ] )
            ->addColumn('alterador',    'integer',  [ 'null' => true ] )
            ->addForeignKey('criador'   ,   'usuarios'  , 'id', [   'delete' => 'SET_NULL'  ,   'update' => 'NO_ACTION' ]   )
            ->addForeignKey('alterador' ,   'usuarios'  , 'id', [   'delete' => 'SET_NULL'  ,   'update' => 'NO_ACTION' ]   )
            ->addForeignKey('empresa_id',   'empresa'   , 'id', [   'delete' => 'CASCADE'   ,   'update' => 'NO_ACTION' ]   )
            ->create();
    }
}
