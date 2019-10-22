<?php

use Phinx\Migration\AbstractMigration;

class DocumentoMigration extends AbstractMigration
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
        $table = $this->table('documento');
        $table
            ->addColumn('empresa_id',           'integer')
            ->addColumn('cod_workflow',         'integer',  [ 'null' => true ]                        )
            ->addColumn('cod_documento',        'string',   [ 'limit'   => 45 ]  )
            ->addColumn('tipo_documento',       'string',   [ 'limit'   => 45                                                       ])
            ->addColumn('valor',                'decimal',  [ 'default' => 0.00, 'null' => false, 'precision' => 10, 'scale' => 2   ])
            ->addColumn('solicitantes',         'string',   [ 'limit'   => 45                                                       ])
            ->addColumn('aprovador',            'string',   [ 'limit'   => 45                                                       ])
            ->addColumn('valor_medio_anterior', 'decimal',  [ 'default' => 0.00, 'null' => false, 'precision' => 10, 'scale' => 2   ])
            ->addColumn('info_1',               'text'                           )
            ->addColumn('info_2',               'text'                           )
            ->addColumn('info_3',               'text'                           )
            ->addColumn('info_4',               'text'                           )
            ->addColumn('info_5',               'text'                           )
            ->addColumn('texto_1',              'text'                           )
            ->addColumn('texto_2',              'text'                           )
            ->addColumn('texto_3',              'text'                           )
            ->addColumn('texto_4',              'text'                           )
            ->addColumn('texto_5',              'text'                           )
            ->addColumn('texto_6',              'text'                           )
            ->addColumn('texto_7',              'text'                           )
            ->addColumn('texto_8',              'text'                           )
            ->addColumn('texto_9',              'text'                           )
            ->addColumn('texto_10',             'text'                           )
            ->addColumn('inteiro_1',            'integer'                        )
            ->addColumn('inteiro_2',            'integer'                        )
            ->addColumn('inteiro_3',            'integer'                        )
            ->addColumn('inteiro_4',            'integer'                        )
            ->addColumn('inteiro_5',            'integer'                        )
            ->addColumn('inteiro_6',            'integer'                        )
            ->addColumn('inteiro_7',            'integer'                        )
            ->addColumn('inteiro_8',            'integer'                        )
            ->addColumn('inteiro_9',            'integer'                        )
            ->addColumn('inteiro_10',           'integer'                        )
            ->addColumn('moeda_1',              'decimal',  [ 'default' => 0.00, 'null' => false, 'precision' => 10, 'scale' => 2 ])
            ->addColumn('moeda_2',              'decimal',  [ 'default' => 0.00, 'null' => false, 'precision' => 10, 'scale' => 2 ])
            ->addColumn('moeda_3',              'decimal',  [ 'default' => 0.00, 'null' => false, 'precision' => 10, 'scale' => 2 ])
            ->addColumn('moeda_4',              'decimal',  [ 'default' => 0.00, 'null' => false, 'precision' => 10, 'scale' => 2 ])
            ->addColumn('moeda_5',              'decimal',  [ 'default' => 0.00, 'null' => false, 'precision' => 10, 'scale' => 2 ])
            ->addColumn('moeda_6',              'decimal',  [ 'default' => 0.00, 'null' => false, 'precision' => 10, 'scale' => 2 ])
            ->addColumn('moeda_7',              'decimal',  [ 'default' => 0.00, 'null' => false, 'precision' => 10, 'scale' => 2 ])
            ->addColumn('moeda_8',              'decimal',  [ 'default' => 0.00, 'null' => false, 'precision' => 10, 'scale' => 2 ])
            ->addColumn('moeda_9',              'decimal',  [ 'default' => 0.00, 'null' => false, 'precision' => 10, 'scale' => 2 ])
            ->addColumn('moeda_10',             'decimal',  [ 'default' => 0.00, 'null' => false, 'precision' => 10, 'scale' => 2 ])
            ->addColumn('criacao',              'datetime'                      )
            ->addColumn('criador',              'integer',  [ 'null' => true ]                     )
            ->addColumn('alteracao',            'datetime', [ 'null' => true ]  )
            ->addColumn('alterador',            'integer',  [ 'null' => true ]                       )
            ->addForeignKey('criador',      'usuarios', 'id', [ 'delete' => 'SET_NULL',   'update' => 'NO_ACTION' ] )
            ->addForeignKey('alterador',    'usuarios', 'id', [ 'delete' => 'SET_NULL',   'update' => 'NO_ACTION' ] )
            ->addForeignKey('empresa_id',   'empresa' , 'id', [ 'delete' => 'CASCADE' ,   'update' => 'NO_ACTION' ] )
            ->create();
    }
}
