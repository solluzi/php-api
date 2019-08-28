<?php

use Phinx\Migration\AbstractMigration;

class SystemUser extends AbstractMigration
{

    public function up()
    {
        $exists = $this->hasTable('system_user');
        if (!$exists) {
            $table = $this->table('system_user', ['id' => false, 'primary_key' => 'id']);
            $table
                ->addColumn('id',                   'biginteger')
                ->addColumn('company_id',           'biginteger',   ['null'     => true])
                ->addColumn('user_id',              'biginteger',   ['null'     => true])
                ->addColumn('picture',              'string',       ['null'     => true, 'limit' => 45])
                ->addColumn('firstname',            'string',       ['limit'    => 88]  )
                ->addColumn('lastname',             'string',       ['limit'    => 88]  )
                ->addColumn('cpf',                  'char',         ['limit'    => 14, 'null' => true])
                ->addColumn('rg',                   'string',       ['limit'    => 20, 'null' => true])
                ->addColumn('birthdate',            'date',         ['null'     => true])
                ->addColumn('mothers_name',         'string',       ['null'     => true, 'limit' => 255])
                ->addColumn('father',               'string',       ['null'     => true, 'limit' => 255])
                ->addColumn('email',                'string',       ['limit'    => 255] )
                ->addColumn('email_verifyed_at',    'date',         ['null'     => true])
                ->addColumn('phone',                'string',       ['null'     => true, 'limit' => 14])
                ->addColumn('cellphone',            'string',       ['null'     => true, 'limit' => 14])
                ->addColumn('zipcode',              'char',         ['null'     => true, 'limit' => 9] )
                ->addColumn('address',              'text',         ['null'     => true])
                ->addColumn('number',               'string',       ['null'     => true, 'limit' => 40])
                ->addColumn('neigborhood',          'text',         ['null'     => true])
                ->addColumn('city',                 'text',         ['null'     => true])
                ->addColumn('state',                'char',         ['null'     => true, 'limit' => 2] )
                ->addColumn('status',               'char',         ['null'     => true, 'limit' => 2] )
                ->addColumn('created',              'timestamp',    ['default'  => 'CURRENT_TIMESTAMP'])
                ->addColumn('updated',              'timestamp',    ['default'  => 'CURRENT_TIMESTAMP'])
                ->save();
        }
    }

    public function down()
    {
        $this->dropTable('system_user');
    }
}
