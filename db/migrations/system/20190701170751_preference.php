<?php

use Phinx\Migration\AbstractMigration;

class Preference extends AbstractMigration
{

    public function up()
    {
        $exists = $this->hasTable('preference');
        if (!$exists) {
            $table = $this->table('preference', ['id' => false, 'primary_key' => 'id']);
            $table->addColumn('id', 'biginteger')
                ->addColumn('company_id', 'biginteger')
                ->addColumn('user_id', 'biginteger')
                ->addColumn('domain', 'string', ['limit' => 100])
                ->addColumn('auth', 'string', ['limit' => 255])
                ->addColumn('host', 'string', ['limit' => 100])
                ->addColumn('port', 'integer')
                ->addColumn('user', 'string', ['limit' => 200])
                ->addColumn('pass', 'string', ['limit' => 255])
                ->addColumn('from', 'string', ['limit' => 255])
                ->addColumn('support', 'string', ['limit' =>  255])
                ->addColumn('created', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->addColumn('updated', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                // Foreign keys
                ->addForeignKey('company_id', 'company', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
                ->addForeignKey('user_id', 'company', 'id', ['delete' => 'SET_NULL', 'update' => 'CASCADE'])
                ->save();
        }
    }

    public function down()
    {
        $this->dropTable('preference');
    }
}
